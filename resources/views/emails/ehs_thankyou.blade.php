<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>EHS Assessment Received — Soapbox</title>
</head>
<body style="margin:0;padding:0;background:#F0F2F5;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0"
  style="background:#F0F2F5;padding:40px 16px;">
  <tr><td align="center">

    <table width="600" cellpadding="0" cellspacing="0" border="0"
      style="max-width:600px;width:100%;background:#ffffff;
             border-radius:16px;overflow:hidden;
             box-shadow:0 8px 32px rgba(0,0,0,0.10);">

      {{-- Header --}}
      <tr>
        <td style="background:#0b1c3d;padding:28px 40px;text-align:center;">
          <img src="https://soapbox.cloud/images/logo.png" alt="Soapbox"
            height="44" style="display:inline-block;height:44px;">
        </td>
      </tr>

      {{-- Blue accent bar --}}
      <tr>
        <td height="4" style="background:#1E63AC;font-size:0;line-height:0;">&nbsp;</td>
      </tr>

      {{-- Hero --}}
      <tr>
        <td style="background:#fafafa;padding:44px 40px 32px;text-align:center;
                   border-bottom:1px solid #EEEEEE;">
          <div style="display:inline-block;width:68px;height:68px;
                      background:#EBF3FB;border-radius:50%;
                      line-height:68px;text-align:center;margin-bottom:20px;">
            <span style="font-size:30px;line-height:68px;">📋</span>
          </div>
          <h1 style="margin:0 0 10px;color:#0b1c3d;font-size:24px;
                     font-weight:700;letter-spacing:-0.5px;">
            Assessment Received, {{ $data['name'] }}!
          </h1>
          <p style="margin:0;color:#666;font-size:15px;line-height:1.6;">
            Your EHS diagnostic has been successfully submitted<br>
            and is now being reviewed by our team.
          </p>
        </td>
      </tr>

      {{-- Body --}}
      <tr>
        <td style="padding:36px 40px;">

          <p style="margin:0 0 18px;color:#444;font-size:15px;line-height:1.7;">
            Hi <strong style="color:#0b1c3d;">{{ $data['name'] }}</strong>,
          </p>
          <p style="margin:0 0 22px;color:#555;font-size:15px;line-height:1.7;">
            Thank you for completing the <strong style="color:#0b1c3d;">EHS Diagnostic Assessment</strong>
            with Soapbox.Cloud. Our experts will analyse your responses against real industry benchmarks
            and prepare a personalised gap report for your operation.
          </p>

          {{-- Summary box --}}
          <table width="100%" cellpadding="0" cellspacing="0" border="0"
            style="background:#EBF3FB;border:1px solid #B5D4F4;
                   border-radius:10px;margin:0 0 28px;">
            <tr>
              <td style="padding:20px 24px;">
                <p style="margin:0 0 14px;color:#0b1c3d;font-size:13px;
                           font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">
                  📋 &nbsp;Your Submission
                </p>
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                  @if(!empty($data['email']))
                  <tr>
                    <td width="38%" style="padding:5px 0;color:#5580A6;font-size:13px;">Email</td>
                    <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">{{ $data['email'] }}</td>
                  </tr>
                  @endif
                  @if(!empty($data['company']))
                  <tr>
                    <td style="padding:5px 0;color:#5580A6;font-size:13px;">Company</td>
                    <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">{{ $data['company'] }}</td>
                  </tr>
                  @endif
                  @if(!empty($data['industry']))
                  <tr>
                    <td style="padding:5px 0;color:#5580A6;font-size:13px;">Industry</td>
                    <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">{{ $data['industry'] }}</td>
                  </tr>
                  @endif
                  @if(!empty($data['employees']))
                  <tr>
                    <td style="padding:5px 0;color:#5580A6;font-size:13px;">Employees</td>
                    <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">{{ $data['employees'] }}</td>
                  </tr>
                  @endif
                </table>
              </td>
            </tr>
          </table>

          {{-- What happens next --}}
          <p style="margin:0 0 16px;color:#0b1c3d;font-size:13px;
                     font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">
            📌 &nbsp;What Happens Next?
          </p>

          @foreach([
            ['🔍', 'We analyse your responses',         'Every answer is benchmarked against real EHS incident data.'],
            ['📊', 'Personalised report prepared',       'A site-specific gap analysis with recommended corrective actions.'],
            ['📞', 'A consultant will be in touch',      'Expect contact within 48 hours to walk through your results.'],
          ] as [$icon, $title, $body])
          <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
            <tr>
              <td width="44" valign="top">
                <div style="width:36px;height:36px;border-radius:50%;
                            background:#EBF3FB;text-align:center;
                            line-height:36px;font-size:16px;">{{ $icon }}</div>
              </td>
              <td style="padding-left:12px;" valign="middle">
                <p style="margin:0;color:#0b1c3d;font-size:14px;font-weight:600;">{{ $title }}</p>
                <p style="margin:2px 0 0;color:#888;font-size:13px;">{{ $body }}</p>
              </td>
            </tr>
          </table>
          @endforeach

          {{-- CTA --}}
          <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:28px;">
            <tr>
              <td align="center">
                <a href="mailto:info@soapbox.cloud"
                  style="display:inline-block;padding:14px 36px;
                         background:#1E63AC;color:#ffffff;
                         text-decoration:none;border-radius:8px;
                         font-size:14px;font-weight:700;letter-spacing:0.02em;">
                  ✉️ &nbsp; Contact Us
                </a>
              </td>
            </tr>
          </table>

        </td>
      </tr>

      {{-- Footer --}}
      <tr>
        <td style="background:#0b1c3d;padding:32px 40px;text-align:center;">
          <img src="https://soapbox.cloud/images/logo.png" alt="Soapbox"
            height="32" style="height:32px;margin:0 auto 14px;display:block;">
          <p style="margin:0 0 6px;color:#fff;font-size:13px;font-weight:600;letter-spacing:0.02em;">
            Intelligent Platform for Responsible Enterprises
          </p>
          <p style="margin:0 0 20px;">
            <a href="mailto:info@soapbox.cloud"
              style="color:#7EB8E8;font-size:13px;text-decoration:none;">
              info@soapbox.cloud
            </a>
          </p>
          <table align="center" cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;">
            <tr>
              <td style="padding:0 6px;"><a href="https://www.instagram.com/soapbox.cloud/" target="_blank"><img src="https://soapbox.cloud/images/social/instagram.png" width="22" height="22" alt="Instagram" style="display:block;border-radius:4px;"></a></td>
              <td style="padding:0 6px;"><a href="https://www.facebook.com/soapboxsoftwaresolutions/" target="_blank"><img src="https://soapbox.cloud/images/social/facebook.png" width="22" height="22" alt="Facebook" style="display:block;border-radius:4px;"></a></td>
              <td style="padding:0 6px;"><a href="https://www.linkedin.com/company/soapboxgroup/" target="_blank"><img src="https://soapbox.cloud/images/social/linkedin.png" width="22" height="22" alt="LinkedIn" style="display:block;border-radius:4px;"></a></td>
              <td style="padding:0 6px;"><a href="https://in.pinterest.com/soapboxsoftwaresolutions/" target="_blank"><img src="https://soapbox.cloud/images/social/pinterest.png" width="22" height="22" alt="Pinterest" style="display:block;border-radius:4px;"></a></td>
              <td style="padding:0 6px;"><a href="https://x.com/SoapBox_in" target="_blank"><img src="https://soapbox.cloud/images/social/twitter.png" width="22" height="22" alt="X / Twitter" style="display:block;border-radius:4px;"></a></td>
            </tr>
          </table>
          <p style="margin:0;color:#7A8AAA;font-size:12px;line-height:1.6;">
            © {{ date('Y') }} Soapbox.Cloud. All rights reserved.<br>
            You're receiving this because you completed an EHS assessment on
            <a href="https://soapbox.cloud" style="color:#7A8AAA;">soapbox.cloud</a>
          </p>
        </td>
      </tr>

    </table>
  </td></tr>
</table>
</body>
</html>