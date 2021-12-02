import lightGallery from 'lightgallery';
import lgVideo from 'lightgallery/plugins/video';

const videosPlayer = {
    init(){
        lightGallery(document.getElementById('smart-tech-youtube-video'), {
            plugins: [ lgVideo]
        });
    }
}

export default videosPlayer;