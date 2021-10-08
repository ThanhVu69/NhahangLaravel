<html>

<head>


<script src="http://sieuthiwebsitedep.com/templates/nicewebmarket/js/jquery.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
            $('.blink').each(function() {
                var elem = $(this);
                setInterval(function() {
                    if (elem.css('visibility') == 'hidden') {
                        elem.css('visibility', 'visible');
                    } else {
                        elem.css('visibility', 'hidden');
                    }    
                }, 800);
            });
        });

</script>

</head>

<body>

<div class="hotline">HOTLINE: <h6 class="blink">0974 347 843</h6> - SUPPORT <h6 class="blink">24/24h</h6></div>

</body>

</html>