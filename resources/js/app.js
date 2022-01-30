require('./bootstrap');

import Alpine from 'alpinejs';

import '@fortawesome/fontawesome-free/css/solid.css'
import '@fortawesome/fontawesome-free/css/fontawesome.css'

Alpine.data('pictures', () => ({
    images: [],

    showUploadWidget() {
        cloudinary.openUploadWidget({
            cloudName: "championship",
            uploadPreset: "legends",
            sources: [
                "camera",
                "local"
            ],
            defaultSource: "local",
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
                console.log("new image", result.info)
                this.images.push(result.info)
            }
        });
    }
}))

Alpine.start();
