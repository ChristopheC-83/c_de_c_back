const demoBaseConfig = {
    selector: 'textarea#classic',
    width: "100%",
    height: 1000,
    resize: false,
    autosave_ask_before_unload: false,
    powerpaste_allow_local_images: true,
    plugins: [
      'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
      'image', 'tinydrive', 'lists', 'link', 'media','preview',
      'searchreplace', 'table', 'visualblocks', 'wordcount'
    ],
    toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
    spellchecker_dialog: true,
    spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
    tinydrive_demo_files_url: '../_images/tiny-drive-demo/demo_files.json',
    tinydrive_token_provider: (success, failure) => {
      success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
    image_class_list: [
      {title: 'Standard Image', value: 'standard-img'}
    ]
  };
  
  tinymce.init(demoBaseConfig);