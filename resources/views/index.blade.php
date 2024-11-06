<head>
    <title>
        リッチテキストコンバーター
    </title>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <style>
        #input-area, header {
            height: 100; /* 高さを500pxに設定 */
            width: 80%; /* 幅を500pxに設定 */
            background-color:white ;
        }
        #output-area {
            padding-top:40px;
        }
        textarea {
            width:80%;
        }
        #pre-input-area {
            float: left;
            border:1px solid black;
            width:30%;
        }
        #preview-area {
            margin-left:50px;
            width: 60%;
            inline:block;
            float:left;
        }
        #preview {
            border:1px solid black;
        }
    </style>
</head>
<body>
    <div id="title">
        <h1>
            リッチテキスト・コンバ〜タ〜
        </h1>
    </div>
    <div id="pre-input-area">
        <p>入力</p>
        <div id="input-area" width="300px">
        </div>
        <div id="output-area">
            <p>DBに登録されるデータ</p>
            <textarea name="" id="output" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div id="preview-area">
        <p>プレビュー</p>
        <div id="preview">
        </div>
    </div>

</body>
<script>
    const quill = new Quill('#input-area', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                [{ 'font': [] }],
                [{ 'align': [] }],
                ['bold', 'italic', 'underline'],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ]
        }
    });

    // 新しいコード: quillのtext-changeイベントをリッスンします
    quill.on('text-change', function() {
        let htmlContent = quill.root.innerHTML;
        document.getElementById('output').value = htmlContent;
        document.getElementById('preview').innerHTML = htmlContent; // preview-areaにも同じ内容を表示
    });
</script>