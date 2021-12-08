const $ = window.jQuery;
const $window = window.$window || $(window);

const SelectButton = {
    init () {

        $(document).ready(function() {
            $('.facetwp-sort-select').select2({
                minimumResultsForSearch: Infinity,
                width: '100%',
            });
            
        });

    }
}

export default SelectButton