import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
window.ClassicEditor = ClassicEditor;

ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

// import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
// import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
// import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
// import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
// import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
// import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
// import CodeBlock from '@ckeditor/ckeditor5-code-block/src/codeblock';
// import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote';

// ClassicEditor
//     .create(document.querySelector('#editor'), {
//         plugins: [Essentials, Paragraph, Bold, Italic, Alignment, CodeBlock, BlockQuote],
//         toolbar: ['bold', 'italic', 'alignment', 'codeblock']
//     })
//     .then(editor => {
//         console.log('Editor was initialized', editor);
//     })
//     .catch(error => {
//         console.error(error.stack);
//     });