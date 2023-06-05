<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<!DOCTYPE html>
<html lang="en">
    <style>
         /* confetti */
    .confetti {
        left: 0;
        pointer-events: none ;
        position: fixed;
        top: 0;
        transform: translate3d(0, 0, 0);
        will-change: transform;
        height: 100%;
        width: 100%;
        }

        .confetti-item {
        position: absolute;
        transform: translate3d(0, 0, 0);
        will-change: transform;
        }
        @keyframes confetti-fall{
        0% {
            transform: translateY(-100%)
        }
        95%{
            animation-timing-function: ease-in-out;
            transform: translateY(calc(100vh - 55%))
        }
        100%{
            transform: translateY(calc(150vh - 65%))
        }}
    </style>
<body>

    <div class="wrapper">
        <?php include_once "sidebar.html"?>
            <div class="container">
                    <nav>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" id="sidebarcollapse" class="btn btn-info">
                                    <i class="fas fa-align-left"></i>
                                    <span>Menu</span>
                                </button>
                            </div>
                            <div class="col-sm">
                                <h2>    
                                    <?php echo $_SESSION['pagename'];?>
                                </h2>
                            </div>
                        </div>
                    </nav>
                    <div class="container justify text-center">
                        <div class="confetti"></div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#congratsModal">
                            Launch Congradulations Modal
                        </button>
                    </div>
                    
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="congratsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulations!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>      
        $(document).ready(
            function(){
                $('#sidebarcollapse').on('click',function(){
                    $('#sidebar').toggleClass('active');
                });
            }
        )
        function randomize(collection) {
        var randomNumber = Math.floor(Math.random() * collection.length);
        return collection[randomNumber];
    }

    function confetti() {
        $(".confetti").remove();
        var $confettiItems = $('<div class="confetti"></div>'),
            colors = ["#3b5692", "#f9c70b", "#00abed", "#ea6747"],
            height = 6.6,
            width = 6.6;

        var scale, $confettiItem;

        for (var i = 0; i < 100; i++) {
            scale = Math.random() * 1.75 + 1;
            $confettiItem = $(
            "<svg class='confetti-item' width='" +
                width * scale +
                "' height='" +
                height * scale +
                "' viewbox='0 0 " +
                width +
                " " +
                height +
                "'>\n  <use transform='rotate(" +
                Math.random() * 360 +
                ", " +
                width / 2 +
                ", " +
                height / 2 +
                ")' xlink:href='#svg-confetti' />\n</svg>"
            );
            $confettiItem.css({
            animation:
                Math.random() +
                2 +
                "s " +
                Math.random() * 2 +
                "s confetti-fall ease-in both",
            color: randomize(colors),
            left: Math.random() * 100 + "vw"
            });
            $confettiItems.append($confettiItem);
        }
        $("body").append($confettiItems);
    }

    $("#congratsModal").on("shown.bs.modal", function() {
        confetti();
    });
    </script>
</body>
</html>
