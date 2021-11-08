<?php
 // This is a global custom CTA that will be available only on mobile devices

function MobileAaqCTA(){
	?>
		<div class="ask-a-question-component">
		    <div class="">
			    <div class="ask-a-question-component-inner">
                    <ul class="ask-a-question-component-inner-element">
                        <li class="aaq-icon-component">
                            <div>
                                <span class="aaq-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="20" fill="#fff"/><path d="M12.922.563A12.922,12.922,0,1,0,25.844,13.485,12.92,12.92,0,0,0,12.922.563Zm4.168,8.754a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,17.091,9.316Zm-8.337,0a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,8.754,9.316ZM18.9,18.185a7.784,7.784,0,0,1-11.963,0,.834.834,0,0,1,1.282-1.068,6.122,6.122,0,0,0,9.4,0A.834.834,0,0,1,18.9,18.185Z" transform="translate(7 6.438)" fill="#fc4f00"/></svg>
                                </span>
                                <span class="aaq-title">Ask A Question</span>
                            </div>
                        </li>
                        <li class="aaq-talk-options">
                            <ul class="aaq-options-list">
                                <li class="aaq-option-item phone">
                                    <a href="">
                                        <span class="phone-icon aaq-option-icon"><i class="fas fa-phone-alt"></i></span>
                                        <span class="aaq-text">Call</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="phone-icon aaq-option-icon"><i class="fas fa-comment"></i></span>
                                        <span class="aaq-text">Text</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:">
                                        <span class="phone-icon aaq-option-icon"><i class="fas fa-envelope"></i></span>
                                        <span class="aaq-text">Email</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
			    </div>
		    </div>
	    </div>
	<?php
}
