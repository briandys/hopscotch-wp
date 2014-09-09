(function() {
    var app = angular.module( 'store', [] );
    
    app.controller( 'StoreController', function(){
        this.products = gems;
    });
    
    var gems = [
        {
            name: 'Dodecahedron',
            price: 2.95,
            description: 'Nothing really.',
            canPurchase: false,
            soldOut: false,
            images: [
                {
                    full: 'http://lorempixel.com/640/480/',
                    thumb: 'http://lorempixel.com/400/200//',
                }
            ]
        },
        {
            name: 'Pentagonal Gem',
            price: 6.95,
            description: 'Nothing really.',
            canPurchase: true,
            soldOut: false,
            images: [
                {
                    full: 'http://lorempixel.com/640/480',
                    thumb: 'http://lorempixel.com/400/200//',
                }
            ]
        }
    ];
    
    app.controller( 'PanelController', function(){
        this.tab = 1;
        
        this.selectTab = function(setTab) {
            this.tab = setTab;
        };
        this.isSelected = function(checkTab){
            return this.tab === checkTab;
        };
    });
})();