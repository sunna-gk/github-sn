<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="">
                        <span>请选择文件</span>
                        <input type="file" name="source" id="file">
                    </div>
                    <div class="">
                        <button type="submit">上传</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
