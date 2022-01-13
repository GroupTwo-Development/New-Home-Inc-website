<?php
$spec_virtual_tour_group = get_field('virtual_tour');
$spec_virtual_tour_url = $spec_virtual_tour_group['virtualtour_url'];
?>

<div id="community-lot" class="accordion-item community-lot">
    <h2 class="accordion-header" id="headingsix">
        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
            <span class="accordion-title">Virtual Tour</span>
        </button>
    </h2>
    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#mainDetailAccordionComponent">
        <div class="accordion-body">
            <header class="accord-header-area">
                <h2>Virtual Tour</h2>
            </header>
            <div class="floorplan-virtual">
                <iframe src="https://my.matterport.com/show/?m=iFYLPPx7djT" width="100%" height="100%"  class="img-fluid" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
