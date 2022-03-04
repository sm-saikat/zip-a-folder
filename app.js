const zip_a_folder = require('zip-a-folder');


const zipFolder = async ()=>{

  await zip_a_folder.zip('theme/luigis', 'wp-theme/luigis.zip');
}

zipFolder()