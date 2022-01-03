import lightGallery from 'lightgallery';
import lgVideo from 'lightgallery/plugins/video';
import { Fancybox } from '@fancyapps/ui';

const videosPlayer = {
	init() {
		lightGallery( document.getElementById( 'smart-tech-youtube-video' ), {
			plugins: [ lgVideo ],
		} );

		lightGallery( document.getElementById( 'community_video-component' ), {
			plugins: [ lgVideo ],
		} );

		lightGallery( document.getElementById( 'open-website' ), {
			selector: 'this',
		} );
	},
};

export default videosPlayer;
