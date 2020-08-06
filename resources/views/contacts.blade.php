<!DOCTYPE html>


@php
    /*
     foreach($contacts as $contact) {
         echo "<br>" . $contact['email'];

         foreach($contact as $key => $item) {
             echo "<br>Key: " . $key . ": " . $item->email;

             foreach($item as $value) {
                 echo "<br>Value:" . $value;
             }

         }


         echo "<br><br>";
     }
 */
     //dd("stop......");
@endphp



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /*height: 100vh;*/
                margin: 0;
            }

            .full-height {
                /*height: 100vh;*/
                padding-top: 50px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .contacts-table {
                width: 1000px;
                border-spacing: 0px;
                border: 1px solid #000000;
            }

            tr {

            }

            th {
                padding: 10px;
            }
            td {
                padding: 10px;
                border-top: 1px solid black;
            }

            .contacts-thead {
                background-color: #fbfbfb;
            }

            .contact-img {
                vertical-align: middle;
                max-height: 20px;
                width: auto;
            }

            #profileImage {
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: #cccccc;
                font-size: 10px;
                font-weight: bold;
                color: #000000;
                text-align: center;
                line-height: 20px;
                /*margin: 20px 0;*/
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#chk-all").change(function(event) {
                    if ($("#chk-all:checked").length) {
                        $("input:checkbox").prop("checked", true);
                    } else {
                        $("input:checkbox").prop("checked", false);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <table class="contacts-table">
                <thead class="contacts-thead">
                <tr>
                    <th align="center" class="price-th"><input type="checkbox" id="chk-all" value="all"></th>
                    <th align="left" class="price-th">Name</th>
                    <th align="left" class="price-th">Email</th>
                    <th align="left" class="price-th">Account</th>
                    <th align="left" class="price-th">Phone number</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $contact)
                    @php

                        $contact_initials = substr($contact['firstName'], 0, 1) . substr($contact['lastName'], 0, 1);

                        // Allow only Digits, remove all other characters.
                        $phone_number = preg_replace("/[^\d]/","",$contact['phone']);
                        $length = strlen($phone_number);
                        $phone_number = ($length == 10) ? "(".substr($phone_number, 0, 3).") ".substr($phone_number, 3, 3)."-".substr($phone_number,6) : '--';
                    @endphp

                    <tr>
                        <td><input type="checkbox" id="chk-contact" value="{{ $contact['id'] }}"></td>
                        <td style="vertical-align: middle;">

                                @if($contact_initials != '')
                                    <div id="profileImage" style="float:left">{{ strtoupper($contact_initials) }}</div>
                                @else
                                    <div style="float:left"><img class="contact-img" src="https://d226aj4ao1t61q.cloudfront.net/gjcq9h7qt_gravatar_camp_default_circle.png"></div>
                                @endif

                                <div style="margin-left: 30px;">
                                    @if($contact_initials != '')
                                        <a href="#">{{ $contact['firstName'] . " " . $contact['lastName'] }}</a>
                                    @else
                                        --
                                    @endif
                                </div>
                        </td>
                        <td>
                            @if($contact['email'] != '')
                                <a href="#">{{ $contact['email'] }}</a>
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            {{ ($contact['orgname'] != '') ? $contact['orgname'] : '--' }}
                        </td>
                        <td>
                            {{ $phone_number }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </body>
</html>
