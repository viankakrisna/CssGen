<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>CssGen</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/paper/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <style>
        body{
            font-size: 16px;
            background-color: #eee
        }
        #header {
            color: #fff;
            background-color: #123098
        }
        #header h1 {
            color: #fff;
        }
        .form-control {
            display: inline-block;
            width: 40%;
            line-height: 2em;
            margin: 0;
            height: 2em;
            text-align: center;
            box-sizing: border-box;
            float:left

        }
        label {
            font-style: italic;
            display: inline-block;
            width: 60%;
            line-height: 2em;
            margin: 0;
            height: 2em;
            box-sizing: border-box;
            float:left
        }
        label:after {
            content: ':';
        }
        .element {
            padding: 1em 2em 3em;
            background-color: #fff;
            height: 100%;
            margin: 1em 0;
            border-radius: 2px;
        }
    </style>
</head>

<body>
<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">General CSS Generator</h1>
                <p class="text-center">
                    This tool provide simple way to generate general css format
                </p>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <?php

            function template(){
                $elements = array('body', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'a', 'a:hover', '#header', '#footer', '#footer .widgettitle', '#sidebar .widgettitle');
                foreach ($elements as $value ) { 
                    echo'
                        <div class="col-md-4">
                            <div class="element">
                                <h4>' . $value . '</h4>
                                <label for="">font-size</label>
                                <input type="number" class="form-control" value="16">
                                <label for="">line-height</label>
                                <input type="number" class="form-control" value="150">
                                <label for="">font-family</label>
                                <input type="text" class="form-control" value="inherit">
                                <label for="">font-weight</label>
                                <input type="select"class="form-control" value="inherit">
                                <label for="">color</label>
                                <input type="text" class="form-control" value="inherit">
                                <label for="">background-color</label>
                                <input type="text" class="form-control" value="inherit">
                                <hr>
                                <div class="clearfix"></div>
                            </div>
                        </div>'; 
                    }
                }
            template();


            ?>
            <div class="col-md-12 text-center">
                <br>
                <button id="process" class="btn btn-primary">Download Typography.css</button>
                <br>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-right">
                            <br>
                            &copy; 2015 Ade Viankakrisna Fadlil
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    var btn = $('#process');
    btn.on('click', function() {

        var cssGen = {};

        cssGen.values = function() {
            var finalVal = ''
            var selector = {};
                selector.name = [];

            $('.element').each(function(i){
                var self = $(this);
                var element = self.find('h4').text();
                var a = []

                self.find('label').each(function(){
                    a.push($(this).text() + ': ' + $(this).next('input').val())
                });
                a[0] += 'px'
                a[1] += '%'
                
                selector.name[i] = {};
                selector.name[i]['element'] = element;
                selector.name[i].style = a
            })


            for (var i = 0; i < selector.name.length; i++) {
                var e = '';
                for (var d = 0; d < selector.name[i].style.length; d++) {
                    e = e += '    ' + selector.name[i].style[d] + ';\n';
                }
                var finalVal = finalVal += selector.name[i].element + '{\n' + e + '}\n\n'
            }
            return finalVal
        }
        
        var final = cssGen.values();
        var hiddenElement = document.createElement('a');

        hiddenElement.href = 'data:attachment/text,' + encodeURI(final);
        hiddenElement.target = '_blank';
        hiddenElement.download = 'typography.css';
        hiddenElement.click();
    });
    </script>
</body>

</html>
