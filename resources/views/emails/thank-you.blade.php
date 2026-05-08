<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thank You — Soapbox</title>
</head>

<body style="margin:0; padding:0; background-color:#F0F2F5; font-family: Arial, Helvetica, sans-serif;">

   <!-- Outer wrapper -->
   <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F0F2F5; padding:40px 16px;">
      <tr>
         <td align="center">

            <!-- Email card -->
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background:#ffffff;
                              border-radius:16px; overflow:hidden;
                              box-shadow:0 8px 32px rgba(0,0,0,0.10);">

               <!-- ───── HEADER ───── -->
               <tr>
                  <td style="background:#0b1c3d; padding:28px 40px; text-align:center;">
                     <img src="https://soapbox.cloud/images/logo.png" alt="Soapbox" height="44"
                        style="display:inline-block; height:44px;">
                  </td>
               </tr>

               <!-- ───── ORANGE ACCENT BAR ───── -->
               <tr>
                  <td height="4" style="background:#FF5C35; font-size:0; line-height:0;">&nbsp;</td>
               </tr>

               <!-- ───── HERO BLOCK ───── -->
               <tr>
                  <td style="background:#fafafa; padding:44px 40px 32px; text-align:center;
                                   border-bottom:1px solid #EEEEEE;">

                     <!-- Check circle -->
                     <div style="display:inline-block; width:68px; height:68px;
                                        background:rgba(34,197,94,0.10); border-radius:50%;
                                        line-height:68px; text-align:center;
                                        margin-bottom:20px;">
                        <span style="font-size:30px; line-height:68px;">✅</span>
                     </div>

                     <h1 style="margin:0 0 10px; color:#0b1c3d; font-size:26px;
                                       font-weight:700; letter-spacing:-0.5px;">
                        Thank You, {{ $contact['first_name'] }}!
                     </h1>

                     <p style="margin:0; color:#666666; font-size:15px; line-height:1.6;">
                        We've received your message and appreciate you<br>
                        taking the time to reach out to us.
                     </p>

                  </td>
               </tr>

               <!-- ───── BODY ───── -->
               <tr>
                  <td style="padding:36px 40px;">

                     <p style="margin:0 0 18px; color:#444444; font-size:15px; line-height:1.7;">
                        Hi <strong style="color:#0b1c3d;">{{ $contact['first_name'] }}
                           {{ $contact['last_name'] }}</strong>,
                     </p>

                     <p style="margin:0 0 18px; color:#555555; font-size:15px; line-height:1.7;">
                        Thank you for contacting <strong style="color:#0b1c3d;">Soapbox</strong>.
                        Our team will carefully review your enquiry and get back to you
                        with the right assistance as soon as possible.
                     </p>

                     <!-- Submission summary box -->
                     <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#F7F9FF; border:1px solid #E0E7FF;
                                          border-radius:10px; margin:24px 0;">
                        <tr>
                           <td style="padding:20px 24px;">

                              <p style="margin:0 0 14px; color:#0b1c3d; font-size:13px;
                                                  font-weight:700; letter-spacing:0.08em;
                                                  text-transform:uppercase;">
                                 📋 &nbsp;Your Submission Details
                              </p>

                              <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                 @if(!empty($contact['email']))
                                    <tr>
                                       <td width="36%" style="padding:6px 0; color:#888; font-size:13px;">Email</td>
                                       <td style="padding:6px 0; color:#0b1c3d; font-size:13px; font-weight:600;">
                                          {{ $contact['email'] }}
                                       </td>
                                    </tr>
                                 @endif

                                 @if(!empty($contact['phone']))
                                    <tr>
                                       <td style="padding:6px 0; color:#888; font-size:13px;">Phone</td>
                                       <td style="padding:6px 0; color:#0b1c3d; font-size:13px; font-weight:600;">
                                          {{ $contact['phone'] }}
                                       </td>
                                    </tr>
                                 @endif

                                 @if(!empty($contact['company']))
                                    <tr>
                                       <td style="padding:6px 0; color:#888; font-size:13px;">Company</td>
                                       <td style="padding:6px 0; color:#0b1c3d; font-size:13px; font-weight:600;">
                                          {{ $contact['company'] }}
                                       </td>
                                    </tr>
                                 @endif

                                 @if(!empty($contact['country']))
                                    <tr>
                                       <td style="padding:6px 0; color:#888; font-size:13px;">Country</td>
                                       <td style="padding:6px 0; color:#0b1c3d; font-size:13px; font-weight:600;">
                                          {{ $contact['country'] }}
                                       </td>
                                    </tr>
                                 @endif

                              </table>

                           </td>
                        </tr>
                     </table>

                     <!-- What happens next -->
                     <p style="margin:0 0 16px; color:#0b1c3d; font-size:13px;
                                      font-weight:700; letter-spacing:0.08em; text-transform:uppercase;">
                        📌 &nbsp;What Happens Next?
                     </p>

                     <!-- Step 1 -->
                     <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                        <tr>
                           <td width="44" valign="top">
                              <div style="width:36px; height:36px; border-radius:50%;
                                                    background:rgba(255,92,53,0.08);
                                                    text-align:center; line-height:36px; font-size:16px;">
                                 📧
                              </div>
                           </td>
                           <td style="padding-left:12px;" valign="middle">
                              <p style="margin:0; color:#0b1c3d; font-size:14px; font-weight:600;">
                                 Confirmation email sent
                              </p>
                              <p style="margin:2px 0 0; color:#888; font-size:13px;">
                                 This email is your confirmation — keep it for your records.
                              </p>
                           </td>
                        </tr>
                     </table>

                     <!-- Step 2 -->
                     <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                        <tr>
                           <td width="44" valign="top">
                              <div style="width:36px; height:36px; border-radius:50%;
                                                    background:rgba(255,92,53,0.08);
                                                    text-align:center; line-height:36px; font-size:16px;">
                                 🔍
                              </div>
                           </td>
                           <td style="padding-left:12px;" valign="middle">
                              <p style="margin:0; color:#0b1c3d; font-size:14px; font-weight:600;">
                                 Our team reviews your message
                              </p>
                              <p style="margin:2px 0 0; color:#888; font-size:13px;">
                                 We read every enquiry personally and carefully.
                              </p>
                           </td>
                        </tr>
                     </table>

                     <!-- Step 3 -->
                     <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;">
                        <tr>
                           <td width="44" valign="top">
                              <div style="width:36px; height:36px; border-radius:50%;
                                                    background:rgba(255,92,53,0.08);
                                                    text-align:center; line-height:36px; font-size:16px;">
                                 💬
                              </div>
                           </td>
                           <td style="padding-left:12px;" valign="middle">
                              <p style="margin:0; color:#0b1c3d; font-size:14px; font-weight:600;">
                                 We'll be in touch within 24–48 hours
                              </p>
                              <p style="margin:2px 0 0; color:#888; font-size:13px;">
                                 Mon – Fri, 9am – 6pm EST. Urgent? Email us directly.
                              </p>
                           </td>
                        </tr>
                     </table>

                     <!-- CTA Button -->
                     <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                           <td align="center" style="padding-bottom:10px;">
                              <a href="mailto:info@soapbox.cloud" style="display:inline-block; padding:14px 36px;
                                                  background:#FF5C35; color:#ffffff;
                                                  text-decoration:none; border-radius:8px;
                                                  font-size:14px; font-weight:700;
                                                  letter-spacing:0.02em;">
                                 ✉️ &nbsp; Contact Us
                              </a>
                           </td>
                        </tr>
                     </table>

                  </td>
               </tr>

               <!-- ───── DIVIDER ───── -->
               <tr>
                  <td height="1" style="background:#EEEEEE; font-size:0; line-height:0;">&nbsp;</td>
               </tr>

               <!-- ───── FOOTER ───── -->
               <tr>
                  <td style="background:#0b1c3d; padding:32px 40px; text-align:center;">

                     <!-- Logo repeat (small) -->
                     <img src="https://soapbox.cloud/images/logo.png" alt="Soapbox" height="32"
                        style="height:32px; margin-bottom:14px; display:block; margin-left:auto; margin-right:auto;">

                     <p style="margin:0 0 6px; color:#ffffff; font-size:13px; font-weight:600; letter-spacing:0.02em;">
                        Intelligent Platform for Responsible Enterprises
                     </p>

                     <p style="margin:0 0 20px;">
                        <a href="mailto:info@soapbox.cloud"
                           style="color:#FF8C6B; font-size:13px; text-decoration:none;">
                           info@soapbox.cloud
                        </a>
                     </p>

                     <!-- Social icons -->
                     <table align="center" cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;">
                        <tr>
                           <td style="padding:0 6px;">
                              <a href="https://www.instagram.com/soapbox.cloud/" target="_blank">
                                 <img src="https://soapbox.cloud/images/social/instagram.png" width="22" height="22"
                                    alt="Instagram" style="display:block; border-radius:4px;">
                              </a>
                           </td>
                           <td style="padding:0 6px;">
                              <a href="https://www.facebook.com/soapboxsoftwaresolutions/" target="_blank">
                                 <img src="https://soapbox.cloud/images/social/facebook.png" width="22" height="22"
                                    alt="Facebook" style="display:block; border-radius:4px;">
                              </a>
                           </td>
                           <td style="padding:0 6px;">
                              <a href="https://www.linkedin.com/company/soapboxgroup/" target="_blank">
                                 <img src="https://soapbox.cloud/images/social/linkedin.png" width="22" height="22"
                                    alt="LinkedIn" style="display:block; border-radius:4px;">
                              </a>
                           </td>
                           <td style="padding:0 6px;">
                              <a href="https://in.pinterest.com/soapboxsoftwaresolutions/" target="_blank">
                                 <img src="https://soapbox.cloud/images/social/pinterest.png" width="22" height="22"
                                    alt="Pinterest" style="display:block; border-radius:4px;">
                              </a>
                           </td>
                           <td style="padding:0 6px;">
                              <a href="https://x.com/SoapBox_in" target="_blank">
                                 <img src="https://soapbox.cloud/images/social/twitter.png" width="22" height="22"
                                    alt="X / Twitter" style="display:block; border-radius:4px;">
                              </a>
                           </td>
                        </tr>
                     </table>

                     <!-- Legal -->
                     <p style="margin:0; color:#7A8AAA; font-size:12px; line-height:1.6;">
                        © {{ date('Y') }} Soapbox.Cloud. All rights reserved.<br>
                        You're receiving this email because you submitted a contact form on
                        <a href="https://soapbox.cloud" style="color:#7A8AAA;">soapbox.cloud</a>
                     </p>

                  </td>
               </tr>

            </table>
            <!-- /Email card -->

         </td>
      </tr>
   </table>

</body>

</html>