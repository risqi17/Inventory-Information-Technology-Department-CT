var DropzoneExample = function () {
    var DropzoneDemos = function () {
        Dropzone.options.singleFileUpload = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            accept: function(file, done) {
               done(file.name);
            }
        };
        Dropzone.options.multiFileUpload = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
        Dropzone.options.fileTypeValidation = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 10, 
            acceptedFiles: "image/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done("Naha, you don't.");
                }
            }
        };
    }
    return {
        init: function() {
            DropzoneDemos();
        }
    };
}();
DropzoneExample.init();