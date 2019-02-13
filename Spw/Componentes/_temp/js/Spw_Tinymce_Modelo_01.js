
get_seletor = '[get_seletor]';

tinymce.init({
selector: get_seletor,
statusbar: false,
menubar: false,
theme: 'modern',
language: 'pt',
fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',

plugins: [
  'advlist autolink lists link image charmap print preview anchor textcolor',
  'searchreplace visualblocks code fullscreen',
  'media table contextmenu paste code wordcount'
],
toolbar: 'formatselect | undo redo  copy cut paste |  bold italic backcolor forecolor fontsize | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat | link code preview ',
content_css: [
  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  '//www.tinymce.com/css/codepen.min.css']

});
