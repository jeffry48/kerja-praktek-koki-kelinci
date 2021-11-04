<script src="<?= base_url() ?>assets/backend/js/plugins/jquery-number/jquery.number.js"></script>
<script type="text/javascript">
    function base64ToBlob(base64, mime) {
      mime = mime || '';
      var sliceSize = 1024;
      var byteChars = window.atob(base64);
      var byteArrays = [];

      for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
      }

      return new Blob(byteArrays, {type: mime});
    }

    $(document).ready(function () {
        $('.thousand').number(true, 0, ',', '.');

        $('.decimal').number(true, 2, ',', '.');

        $.fn.date_check_dd_mm_yyyy = function (string_date) {
            var t = string_date.match(/^(\d{2})-(\d{2})-(\d{4})$/);
            if (t === null)
                return false;
            var d = +t[1], m = +t[2], y = +t[3];

            // Below should be a more acurate algorithm
            if (m >= 1 && m <= 12 && d >= 1 && d <= 31) {
                return true;
            }

            return false;
        }

        $.fn.date_format_view = function (string_date) {
            if (typeof string_date !== 'undefined') {
                if ($.fn.date_check_dd_mm_yyyy(string_date)) {
                    return string_date;
                } else {
                    var p = string_date.split(/\D/g);
                    return [p[2], p[1], p[0]].join("-");
                }
            } else {
                return "";
            }
        }

        $.fn.to_string = function (array_var) {
            var print = "";
            var counter = 0;
            var size = Object.keys(array_var).length;
            $.each(array_var, function (key, value) {
                print = print + (key + "=" + value);
                counter++;
                if (counter < size)
                    print = print + "&";
            });
            return print;
        };

        $.fn.format_number_decimal = function (num, fixedpoint) {
            return $.fn.currency_format_de(num, fixedpoint);
//            return $.fn.currency_format_en(num, fixedpoint);
        };

        $.fn.currency_format_de = function (num, fixedpoint) {
            //https://blog.tompawlak.org/number-currency-formatting-javascript
            return num
                    .toFixed(fixedpoint) // decimal digits
                    .replace(".", ",") // replace decimal point character with ,
                    .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // use . as a separator
        };

        $.fn.currency_format_en = function (num, fixedpoint) {
            //https://blog.tompawlak.org/number-currency-formatting-javascript
            return num.toFixed(fixedpoint).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }

        $.fn.strip_thousand_separator = function (string, decimal, thousand) {
            if (string == "") {
                return parseFloat($.fn.parse_float_options(0, decimal, thousand));
            } else {
                string = string || '';
                decimal = decimal || '.';
                thousand = thousand || ',';
                return parseFloat($.fn.parse_float_options(string, decimal, thousand));
            }
        };

        $.fn.message_builder = function (message, additional_message) {
            if (message != "") {
                message = message + "<br/>";
            }
            message = message + additional_message;
            return message;
        };

        $.fn.parse_float_options = function (number, decimal, thousands) {
            var bits = number.split(decimal, 2);
            var ones = bits[0].replace(new RegExp('\\' + thousands, 'g'), '');
            ones = parseFloat(ones, 10);
            var decimal = parseFloat('0.' + bits[1], 10);
            return ones + decimal;
        };

        $.fn.post_ajax = function (url, json_data, show_alert) {
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: json_data
            }).done(function (results) {
                if (show_alert) {
                    var str = JSON.stringify(results, null, 2); // spacing level = 2
                    alert(str);
                }
                return results;
            });
        };

        $.fn.post_return_ajax = function (url, json_data, handleData) {
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: json_data
            }).done(function (results) {
                handleData(results);
            });
        };

        $.fn.get_data_ajax = function (url, handleData) {
            $.ajax({
                url: url,
//                success: function (data) {
//                    handleData(data);
//                }
            }).done(function (results) {
                handleData(results);
            });
        };

        $.fn.round = function (value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }

        function inv_xmlhtpprequest(url) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var response = xmlhttp.responseText;
                    var json_response = JSON.parse(response);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
    });
</script>