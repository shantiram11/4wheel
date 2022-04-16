 $(function () {
    /** toggle password starts **/
    //toggle password and text type
    $('.btn-toggle-password').on('click', function () {
        let eyeSlashedIcon = $(this).find('.bi-eye-slash');
        // console.log(eyeSlashedIcon);
        let eyeIcon = $(this).find('.bi-eye');
        if (eyeSlashedIcon.hasClass('d-none')) {
            //hide password (text to password)
            eyeSlashedIcon.removeClass('d-none')
            eyeIcon.addClass('d-none');
            $(this).siblings("input[type='text']").attr('type', 'password');
        } else {
            //show password (password to text)
            eyeSlashedIcon.addClass('d-none')
            eyeIcon.removeClass('d-none');
            $(this).siblings("input[type='password']").attr('type', 'text');
        }
    });
    /** toggle password ends **/


    $('.kt_preview_image_close').click(function (e) {
        e.preventDefault();
        let parent_container = $(this).parent('.kt_preview_image_container');
        parent_container.addClass('d-none');
        parent_container.siblings("input[type='file']").val('');
        parent_container.siblings("input[type='hidden']").val('');
        $(this).siblings('.kt_preview_img_element').attr('src','#');

        // $("#file_upload").replaceWith($("#file_upload").val('').clone(true));
    });

    //tinymce init
    // KTTinymce.init();

    // //converting time to user timezone and showing on toolbar
    // let userTimeZone = moment.tz.guess();
    // $('.utc_timezone').each(function(e){
    //
    // });
    // let utcTime = $("#.utc_timezone").html();
    // let utcToUser = moment.utc(utcTime).tz(userTimeZone).format('YYYY-MM-DD HH:mm:ss');
    // $("#utcToUser").html(utcToUser);

     //on change title text update slug value
     //but only if slug field is empty
     $('#slugTitle').on('change',function(){
         let title = $(this).val();
         let new_slug = convertToSlug(title);
         let $slug = $('#slugValue');
         let current_slug_value = $slug.val();
         if(current_slug_value === ""){
             $slug.val(new_slug);
         }
     });
     //slugTitle change ends

});

/** confirm delete will be triggered as confirm box for every delete request **/
function confirmDelete(callback) {
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to delete this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        confirmButtonColor: "#ff2828",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.value) {
            callback();
        }
    });
}
/** confirm delete ends **/

/**
 * following row remove and show row are used while deleting from table
 * first the row will be hidden before submitting, to improve user experience
 * if failed, will be shown back
 **/
/** remove row removes row from table **/
function removeRowFromTable(table, id) {
    $('#' + table + ' tr#' + id).hide();
}
/** show row row from table (which was hidden earlier) **/
function showRowFromTable(table, id) {
    $('#' + table + ' tr#' + id).show();
}
/** remove and show row ends here **/
/** preview currently uploaded images on form**/
function loadPreview(input, id) {
    id = id || '#kt_preview_img';
    let image_container = $(input).siblings('div');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };

        // input.previousElementSibling.value = 'yes';
        // console.log('input >>',input);
        image_container.removeClass('d-none');
        reader.readAsDataURL(input.files[0]);
    }
}


var KTTinymce = function () {
    // Private functions
    var demos = function () {
        tinymce.init({
            selector: '.ks_tinymce',
            menubar: false,
            toolbar: ['styleselect fontselect fontsizeselect',
                'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
            plugins: 'advlist autolink link image lists charmap print preview code',
            automatic_uploads: true,
            file_picker_types: 'image',
            // images_upload_url: '../../upload',
            //uploading image to dashboard/upload, it will add _token in the request as well
            // we have to add token so we are using images_upload_handler as well
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '../../upload');

            xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                // append CSRF token in the form data
                formData.append('_token', CSRF_TOKEN);

            xhr.send(formData);
            },
            // // images_upload_base_path: 'storage/uploads/tiny_mce',
            // // image_prepend_url: 'https://www.localhost/',
            // /* and here's our custom image picker*/
            // file_picker_callback: function (cb, value, meta) {
            //     var input = document.createElement('input');
            //     input.setAttribute('type', 'file');
            //     input.setAttribute('accept', 'image/*');
            //
            //     /*
            //       Note: In modern browsers input[type="filgie"] is functional without
            //       even adding it to the DOM, but that might not be the case in some older
            //       or quirky browsers like IE, so you might want to add it to the DOM
            //       just in case, and visually hide it. And do not forget do remove it
            //       once you do not need it anymore.
            //     */
            //
            //     input.onchange = function () {
            //         var file = this.files[0];
            //
            //         var reader = new FileReader();
            //         reader.onload = function () {
            //             /*
            //               Note: Now we need to register the blob in TinyMCEs image blob
            //               registry. In the next release this part hopefully won't be
            //               necessary, as we are looking to handle it internally.
            //             */
            //             var id = 'blobid' + (new Date()).getTime();
            //             var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            //             var base64 = reader.result.split(',')[1];
            //             var blobInfo = blobCache.create(id, file, base64);
            //             blobCache.add(blobInfo);
            //
            //             /* call the callback and populate the Title field with the file name */
            //             cb(blobInfo.blobUri(), { title: file.name });
            //         };
            //         reader.readAsDataURL(file);
            //     };
            //
            //     input.click();
            // },
        });
    }
    return {
        // public functions
        init: function () {
            demos();
        }
    };
}();


//toggle div starts
function toggleDiv(buttonId, sectionToToggleId){
    let button = document.getElementById(buttonId);
    let div = document.getElementById(sectionToToggleId);
    if(button.checked){
        $(div).removeClass('d-none')
    }else{
        $(div).addClass('d-none')
    }
}
//toggle div ends

 //dropdown toggle div starts
 function toggleOption(buttonId, sectionToToggleId){
    console.log('a');
     let button = document.getElementById(buttonId);
     let div = document.getElementById(sectionToToggleId);
     if(button.checked){
         $(div).removeClass('d-none')
     }else{
         $(div).addClass('d-none')
     }
 }

 //dropdown toggle div ends

 //convert test to slug
 function convertToSlug(Text) {
     return Text.toLowerCase()
         .replace(/ /g, '-')
         .replace(/[^\w-]+/g, '');
 }
 //convert test to slug

