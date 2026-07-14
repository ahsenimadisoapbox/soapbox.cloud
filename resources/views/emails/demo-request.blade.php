```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo Request Received — Soapbox.Cloud</title>
</head>
<body style="margin:0;padding:0;background:#F0F2F5;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0"
       style="background:#F0F2F5;padding:40px 16px;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" border="0"
       style="max-width:600px;width:100%;background:#ffffff;
              border-radius:16px;overflow:hidden;
              box-shadow:0 8px 32px rgba(0,0,0,0.10);">

    {{-- Header --}}
    <tr>
        <td style="background:#0b1c3d;padding:28px 40px;text-align:center;">
            <img src="https://soapbox.cloud/images/logo.png"
                 alt="Soapbox"
                 height="44"
                 style="display:inline-block;height:44px;">
        </td>
    </tr>

    {{-- Accent Bar --}}
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
                <span style="font-size:30px;line-height:68px;">📅</span>
            </div>

            <h1 style="margin:0 0 10px;color:#0b1c3d;font-size:24px;
                       font-weight:700;letter-spacing:-0.5px;">
                Demo Request Received!
            </h1>

            <p style="margin:0;color:#666;font-size:15px;line-height:1.6;">
                Thanks for requesting a personalised demo.<br>
                Our team will review your request and contact you shortly.
            </p>
        </td>
    </tr>

    {{-- Body --}}
    <tr>
        <td style="padding:36px 40px;">

            <p style="margin:0 0 18px;color:#444;font-size:15px;line-height:1.7;">
                Hi <strong style="color:#0b1c3d;">{{ $demoRequest->full_name }}</strong>,
            </p>

            <p style="margin:0 0 24px;color:#555;font-size:15px;line-height:1.7;">
                Thank you for your interest in <strong style="color:#0b1c3d;">Soapbox.Cloud</strong>.
                We’ve received your demo request and will prepare a tailored walkthrough
                based on your business needs.
            </p>

            {{-- Submission Summary --}}
            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                   style="background:#EBF3FB;border:1px solid #B5D4F4;
                          border-radius:10px;margin:0 0 28px;">
                <tr>
                    <td style="padding:20px 24px;">

                        <p style="margin:0 0 14px;color:#0b1c3d;font-size:13px;
                                  font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">
                            📋 Your Demo Request
                        </p>

                        <table width="100%" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td width="38%" style="padding:5px 0;color:#5580A6;font-size:13px;">Full Name</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->full_name }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:5px 0;color:#5580A6;font-size:13px;">Email</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->email }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:5px 0;color:#5580A6;font-size:13px;">Company</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->company_name }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:5px 0;color:#5580A6;font-size:13px;">Industry</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->industry }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:5px 0;color:#5580A6;font-size:13px;">Primary Interest</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->primary_interest }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:5px 0;color:#5580A6;font-size:13px;">Notes</td>
                                <td style="padding:5px 0;color:#0b1c3d;font-size:13px;font-weight:600;">
                                    {{ $demoRequest->notes ?? 'N/A' }}
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>

            {{-- Next Steps --}}
            <p style="margin:0 0 16px;color:#0b1c3d;font-size:13px;
                      font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">
                📌 What Happens Next?
            </p>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                <tr>
                    <td width="44">🔍</td>
                    <td style="font-size:14px;color:#444;">We review your requirements and use case.</td>
                </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                <tr>
                    <td width="44">📅</td>
                    <td style="font-size:14px;color:#444;">Our team will contact you to schedule the demo.</td>
                </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                <tr>
                    <td width="44">🚀</td>
                    <td style="font-size:14px;color:#444;">Experience a tailored walkthrough of Soapbox.Cloud.</td>
                </tr>
            </table>

        </td>
    </tr>

    {{-- Footer --}}
    <tr>
        <td style="background:#0b1c3d;padding:32px 40px;text-align:center;">
            <img src="https://soapbox.cloud/images/logo.png"
                 alt="Soapbox"
                 height="32"
                 style="height:32px;margin:0 auto 14px;display:block;">

            <p style="margin:0 0 6px;color:#fff;font-size:13px;font-weight:600;">
                Intelligent Platform for Responsible Enterprises
            </p>

            <p style="margin:0 0 20px;">
                <a href="mailto:info@soapbox.cloud"
                   style="color:#7EB8E8;font-size:13px;text-decoration:none;">
                    info@soapbox.cloud
                </a>
            </p>

            <p style="margin:0;color:#7A8AAA;font-size:12px;line-height:1.6;">
                © {{ date('Y') }} Soapbox.Cloud. All rights reserved.
            </p>
        </td>
    </tr>

</table>
</td>
</tr>
</table>

</body>
</html>
```
