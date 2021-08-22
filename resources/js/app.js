require('./bootstrap');

require('alpinejs');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
window.ClassicEditor = ClassicEditor;

import * as FilePond from 'filepond';
window.FilePond = FilePond;