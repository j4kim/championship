require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '@fortawesome/fontawesome-free/css/solid.css'
import '@fortawesome/fontawesome-free/css/fontawesome.css'

window.showUploadWidget = function() {
    cloudinary.openUploadWidget({
        cloudName: "championship",
        uploadPreset: "legends",
        sources: [
            "camera",
            "local"
        ],
        defaultSource: "camera",
        styles: {
            palette: {
                tabIcon: "#4F46E5",
                link: "#4F46E5",
                inProgress: "#4F46E5",
            },
        }
    },
    (err, result) => {
        if (!err && result.event === 'success') {
            console.log(result.info)
        }
    });
}
