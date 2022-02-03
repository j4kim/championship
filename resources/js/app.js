import Alpine from 'alpinejs';

Alpine.data('upload', (initialArray = []) => ({
    images: initialArray,

    showWidget() {
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
    },

    remove({ public_id }) {
        this.images = this.images.filter(i => i.public_id !== public_id)
    }
}))

Alpine.start();
