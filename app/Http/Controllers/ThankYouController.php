<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta;

class ThankYouController extends Controller
{
    public function index(Request $request, string $source = 'contact')
    {
        $meta = $this->getMeta('thank-you');
        $configs = [
            'ehs' => [
                'icon'        => '📋',
                'heading'     => 'Assessment Submitted',
                'subheading'  => 'Your EHS diagnostic is in.',
                'intro'       => 'Our team will analyse your responses and deliver a personalised gap report within <strong>48 hours</strong>.',
                'badge_text'  => '',
                'badge_color' => '#1E63AC',
                'badge_bg'    => '#EBF3FB',
                'accent'      => '#1E63AC',
                'steps' => [
                    ['icon' => '🔍', 'title' => 'We review your diagnostic',       'body' => 'Every response is analysed against real EHS benchmarks.'],
                    ['icon' => '📊', 'title' => 'Personalised gap report prepared', 'body' => 'You\'ll receive a site-specific analysis with corrective actions.'],
                    ['icon' => '📞', 'title' => 'A consultant will reach out',      'body' => 'Expect contact within 48 hours to walk through your results.'],
                ],
                'primary_cta'   => ['label' => 'Back to Home',    'url' => '/'],
                'secondary_cta' => ['label' => 'Schedule a Demo',    'url' => 'https://calendly.com/mohammed-moizuddin-soapbox/30min'],
                'meta_title'    => 'Assessment Submitted | Soapbox.Cloud',
            ],
            'contact' => [
                'icon'        => '✅',
                'heading'     => 'Thank You!',
                'subheading'  => 'Your message has been received.',
                'intro'       => 'We\'ll get back to you within <strong>24 hours</strong>.',
                'badge_text'  => 'Typically responds within 24 hours',
                'badge_color' => '#16a34a',
                'badge_bg'    => 'rgba(34,197,94,0.08)',
                'accent'      => '#FF5C35',
                'steps' => [
                    ['icon' => '📧', 'title' => 'Confirmation email sent',      'body' => 'Check your inbox for a copy of your submission.'],
                    ['icon' => '🔍', 'title' => 'Our team reviews your message', 'body' => 'We read every message carefully and personally.'],
                    ['icon' => '💬', 'title' => 'We\'ll be in touch',           'body' => 'Expect a reply within 1 business day.'],
                ],
                'primary_cta'   => ['label' => 'Back to Home',        'url' => '/'],
                'secondary_cta' => ['label' => 'Send Another Message', 'url' => '/contact'],
                'meta_title'    => 'Message Sent | Soapbox.Cloud',
            ],
            'demo' => [
                'icon'        => '🎯',
                'heading'     => 'Demo Request Submitted!',
                'subheading'  => 'Thanks for your interest in Soapbox.Cloud.',
                'intro'       => 'Our team has received your demo request and will contact you within <strong>24 hours</strong> to schedule your personalised walkthrough.',
                'badge_text'  => 'Typically responds within 24 hours',
                'badge_color' => '#2563eb',
                'badge_bg'    => 'rgba(37,99,235,0.08)',
                'accent'      => '#2563eb',
                'steps' => [
                [
                'icon'  => '📩',
                'title' => 'Request received successfully',
                'body'  => 'Your demo request has been securely submitted to our team.'
                ],
                [
                'icon'  => '🔍',
                'title' => 'We review your requirements',
                'body'  => 'Our team will review your industry, use case, and business needs.'
                ],
                [
                'icon'  => '📅',
                'title' => 'Demo scheduling',
                'body'  => 'A product specialist will contact you shortly to schedule your personalised demo.'
                ],
                ],
                'primary_cta'   => [
                'label' => 'Back to Home',
                'url'   => '/'
                ],
                'secondary_cta' => [
                'label' => 'Explore Industries',
                'url'   => '/industries'
                ],
                'meta_title'    => 'Demo Request Submitted | Soapbox.Cloud',
                ],

        ];

        // fallback to contact if unknown source
        $config = $configs[$source] ?? $configs['contact'];

        return view('thank-you', compact('config', 'source', 'meta'));
    }

    public function getMeta($page)
    {
        return Meta::where('page', $page)->first();
    }
}