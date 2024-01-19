@extends('emails.partials.layout')

@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation"
           style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e4e3e6; background-size: auto;"
           width="100%">
        <tbody>
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                       role="presentation"
                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-size: auto; background-color: #ffffff; border-radius: 16px 16px 0 0; color: #000000; width: 640px;"
                       width="640">
                    <tbody>
                    <tr>
                        <td class="column column-1"
                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                            width="100%">
                            <div class="spacer_block block-1"
                                 style="height:40px;line-height:40px;font-size:1px;"> 
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-2"
                                   role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                   width="100%">
                                <tr>
                                    <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                        <div align="center" class="alignment" style="line-height:10px"><a
                                                    href="www.example.com" style="outline:none" tabindex="-1"
                                                    target="_blank"><img
                                                        src="{{asset('assets/email-vector.png') }}"
                                                        style="display: block; height: auto; border: 0; width: 64px; max-width: 100%;"
                                                        width="64"/></a></div>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-3"
                                   role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                   width="100%">
                                <tr>
                                    <td class="pad" style="padding-top:30px;">
                                        <div align="center" class="alignment">
                                            <table border="0" cellpadding="0" cellspacing="0"
                                                   role="presentation"
                                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                   width="100%">
                                                <tr>
                                                    <td class="divider_inner"
                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;">
                                                        <span> </span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block block-4"
                                   role="presentation"
                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                   width="100%">
                                <tr>
                                    <td class="pad"
                                        style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:30px;">
                                        <div style="font-family: Arial, sans-serif">
                                            <div class=""
                                                 style="font-size: 12px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                                                <p style="margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 19.2px;">
                                                    <span style="font-size:24px;color:#2b303a;"><strong>VERIFY YOUR EMAIL</strong></span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block block-5"
                                   role="presentation"
                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                   width="100%">
                                <tr>
                                    <td class="pad"
                                        style="padding-bottom:10px;padding-left:20px;padding-right:20px;padding-top:10px;">
                                        <div style="font-family: sans-serif">
                                            <div class=""
                                                 style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; color: #7a7483; line-height: 1.5;">
                                                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                    <span style="font-size:14px;"><span style="color:#808389;">Hi {{ $full_name ?? 'FULL NAME' }},<br/><br/>We are happy you signed up for CardX. Please </span></span>
                                                </p>
                                                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                    <span style="font-size:14px;"><span style="color:#808389;">Confirm your Email address.</span></span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="spacer_block block-6"
                                 style="height:50px;line-height:50px;font-size:1px;"> 
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" class="button_block block-7"
                                   role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                   width="100%">
                                <tr>
                                    <td class="pad"
                                        style="padding-left:10px;padding-right:10px;padding-top:10px;text-align:center;">
                                        <div align="center" class="alignment"><!--[if mso]>
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                         xmlns:w="urn:schemas-microsoft-com:office:word"
                                                         href="www.example.com"
                                                         style="height:62px;width:171px;v-text-anchor:middle;"
                                                         arcsize="7%" stroke="false" fillcolor="#7b78fd">
                                                <w:anchorlock/>
                                                <v:textbox inset="0px,0px,0px,0px">
                                                    <center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px">
                                            <![endif]--><a href="{{ $url?? 'URL' }}"
                                                           style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#7b78fd;border-radius:4px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:15px;padding-bottom:15px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"
                                                           target="_blank"><span
                                                        style="padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;letter-spacing:1px;"><span
                                                            dir="ltr"
                                                            style="margin: 0; word-break: break-word; line-height: 32px;"><strong>VERIFY NOW</strong></span></span></a>
                                            <!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div>
                                    </td>
                                </tr>
                            </table>
                            <div class="spacer_block block-8"
                                 style="height:50px;line-height:50px;font-size:1px;"> 
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block block-9"
                                   role="presentation"
                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                   width="100%">
                                <tr>
                                    <td class="pad"
                                        style="padding-bottom:25px;padding-left:60px;padding-right:60px;padding-top:25px;">
                                        <div style="font-family: Tahoma, Verdana, sans-serif">
                                            <div class=""
                                                 style="font-size: 12px; font-family: Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; color: #7a7483; line-height: 1.5;">
                                                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 18px;">
                                                            <span style="color:#808389;font-size:12px;">Did you receive this email without signing up? <a
                                                                        href="#" rel="noopener"
                                                                        style="text-decoration: none; color: #7b78fd;"
                                                                        target="_blank"
                                                                        title="Click">Click here.</a><br/>This verification link will expire in 24 hours.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

