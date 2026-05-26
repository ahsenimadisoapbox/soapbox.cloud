<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 
class EhsAIController extends Controller
{
    public function generateInsight(Request $request)
    {
        $answers = $request->answers;
        $score = $request->score;
 
       $prompt = "
You are a senior EHS operational consultant.
 
Analyze the following EHS self-assessment responses.
 
VERY IMPORTANT INSTRUCTIONS:
- Return EXACTLY 5 bullet points overall maximum characters 500.
- EACH line MUST start with '•'
- Keep each bullet short
- Maximum 1 sentence per bullet
- No paragraphs
- No headings
- No markdown titles
- No introductions
- No conclusions
- No extra explanation
- Tone should feel executive and premium
 
Final bullet MUST mention operational improvement direction.
 
Assessment Answers:
" . json_encode($answers) . "
 
Risk Score:
" . $score;
 
        try {
 
            $response = Http::timeout(45)
                ->withHeaders([
                    'x-api-key' => env('CLAUDE_API_KEY'),
                    'anthropic-version' => '2023-06-01',
                    'content-type' => 'application/json',
                ])
                ->post('https://api.anthropic.com/v1/messages', [
 
                    'model' => 'claude-sonnet-4-6',
 
                    'max_tokens' => 1000,
 
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ]
                ]);
 
            $insight =
                $response['content'][0]['text']
                ?? null;
 
            /*
            |--------------------------------------------------------------------------
            | FALLBACK IF CLAUDE RETURNS EMPTY
            |--------------------------------------------------------------------------
            */
 
            if (!$insight || trim($insight) === '') {
 
                $insight = $this->fallbackInsight($score);
 
            }
 
        } catch (\Exception $e) {
 
 
            $insight = $this->fallbackInsight($score);
 
        }
 
        return response()->json([
            'success' => true,
            'insight' => $insight
        ]);
    }
    private function fallbackInsight($score): string
    {
        if ($score >= 70) {
 
            return "• Critical operational gaps are affecting compliance visibility and incident response efficiency.\n\n• Existing workflows appear highly fragmented, increasing audit exposure and corrective action delays.\n\n• Immediate EHS process centralization is recommended to improve operational control and reporting consistency.";
 
        }
 
        if ($score >= 40) {
 
            return "• Current EHS workflows indicate moderate operational inefficiencies across reporting and compliance coordination.\n\n• Manual tracking methods may limit visibility into corrective actions and leadership oversight.\n\n• A structured digital workflow would improve operational accountability and response efficiency.";
 
        }
 
        return "• Your organization demonstrates relatively stable EHS operational maturity with opportunities for further optimization.\n\n• Centralized reporting and automation can strengthen long-term compliance consistency and executive visibility.\n\n• Continued process digitization will improve scalability and operational resilience.";
 
    }
}