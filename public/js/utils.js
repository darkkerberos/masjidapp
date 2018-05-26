utils = {
    objToString: function (obj) {
        var str = '';
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str += p + '::' + obj[p] + '\n';
            }
        }
        return str;
    },

    daysInMonth: function (iMonth, iYear) {
        return new Date(iYear, iMonth + 1, 0).getDate();
    },

    arrayToJson: function (formArray) {
        var obj = {};
        $.each(formArray, function (i, pair) {
            var cObj = obj, pObj, cpName;
            $.each(pair.name.split("."), function (i, pName) {
                pObj = cObj;
                cpName = pName;
                cObj = cObj[pName] ? cObj[pName] : (cObj[pName] = {});
            });
            pObj[cpName] = pair.value;
        });
        return obj;
    },

    createWindow: function (response) {
        var myWindow = window.open("", "MsgWindow", "width=200,height=100");
        myWindow.document.write(response);
    },
    
    imageCropper: function () {
        var crop_max_width = 400;
        var crop_max_height = 400;
        var jcrop_api;
        var canvas;
        var context;
        var image;
        var prefsize;

        function dataURLtoBlob(dataURL) {
            var BASE64_MARKER = ';base64,';
            if (dataURL.indexOf(BASE64_MARKER) == -1) {
                var parts = dataURL.split(',');
                var contentType = parts[0].split(':')[1];
                var raw = decodeURIComponent(parts[1]);

                return new Blob([raw], {
                    type: contentType
                });
            }
            var parts = dataURL.split(BASE64_MARKER);
            var contentType = parts[0].split(':')[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;
            var uInt8Array = new Uint8Array(rawLength);
            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], {
                type: contentType
            });
        }

        function validateImage() {
            if (canvas != null) {
                image = new Image();
                image.onload = restartJcrop;
                image.src = canvas.toDataURL('image/png');
            } else restartJcrop();
        }

        function restartJcrop() {
            if (jcrop_api != null) {
                jcrop_api.destroy();
            }
            $("#views").empty();
            $("#views").append("<canvas id=\"canvas\">");
            canvas = $("#canvas")[0];
            context = canvas.getContext("2d");
            canvas.width = image.width;
            canvas.height = image.height;
            context.drawImage(image, 0, 0);
            $("#canvas").Jcrop({
                onSelect: selectcanvas,
                onRelease: clearcanvas,
                boxWidth: crop_max_width,
                boxHeight: crop_max_height
            }, function() {
                jcrop_api = this;
            });
            clearcanvas();
        }

        function clearcanvas() {
            prefsize = {
                x: 0,
                y: 0,
                w: canvas.width,
                h: canvas.height,
            };
        }

        function selectcanvas(coords) {
            prefsize = {
                x: Math.round(coords.x),
                y: Math.round(coords.y),
                w: Math.round(coords.w),
                h: Math.round(coords.h)
            };
        }

        function applyCrop() {
            canvas.width = prefsize.w;
            canvas.height = prefsize.h;
            context.drawImage(image, prefsize.x, prefsize.y, prefsize.w, prefsize.h, 0, 0, canvas.width, canvas.height);
            validateImage();
        }

        function applyScale(scale) {
            if (scale == 1) return;
            canvas.width = canvas.width * scale;
            canvas.height = canvas.height * scale;
            context.drawImage(image, 0, 0, canvas.width, canvas.height);
            validateImage();
        }

        function applyRotate() {
            canvas.width = image.height;
            canvas.height = image.width;
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.translate(image.height / 2, image.width / 2);
            context.rotate(Math.PI / 2);
            context.drawImage(image, -image.width / 2, -image.height / 2);
            validateImage();
        }

        function applyHflip() {
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.translate(image.width, 0);
            context.scale(-1, 1);
            context.drawImage(image, 0, 0);
            validateImage();
        }

        function applyVflip() {
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.translate(0, image.height);
            context.scale(1, -1);
            context.drawImage(image, 0, 0);
            validateImage();
        }

    }
    
};