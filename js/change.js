var chart;
var selectedCoin = 0;
var wallet = 1000;
var transactionVue = new Vue({
    el: '#transactionHistory',
    data: {
        message:"HAHA",
        cart: {
            items:[]
        }, 
        methods: {},
        transactions:[],
    },
}
)
const skipped = (ctx, value) => ctx.p0.skip || ctx.p1.skip ? value : undefined;
const down = (ctx, value) => ctx.p0.parsed.y > ctx.p1.parsed.y ? value : undefined;
const genericOptions = {
    fill: false,
    interaction: {
      intersect: false
    },
    radius: 0,
  };
var coins = new Vue( {
    el: '#app',
    data: {
        transactionAmount: '0.0',
        cart:{
            items: []
        },

        products:[
            {
                id:0,
                name:'Bitcoin',
                tag:"BTC",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon:'https://s2.coinmarketcap.com/static/img/coins/64x64/1.png'
            },
            {
                id:1,
                name:'Ethereum',
                tag:"ETH",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png'
            },
            {
                id:2,
                name:'Litecoin',
                tag:"LTC",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/16x16/2.png'
            },
            {
                id:3,
                name:'Binance Coin',
                tag:"BNB",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/1839.png'
            },
                {
                id:4,
                name:'Shiba',
                tag:"SHIB",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/5994.png'
            },
            {
                id:5,
                name:'Dogecoin',
                tag:"DOGE",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/74.png'
            },
            {
                id:6,
                name:'Ripple',
                tag:"XRP",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/52.png'
            },
            {
                id:7,
                name:'Cardano',
                tag:"ADA",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/2010.png'
            },
            {
                id:8,
                name:'Polkadot',
                tag:"DOT",
                volume: 0,
                change:'+5%',
                wallet: 0,
                price: 0,
                icon: 'https://s2.coinmarketcap.com/static/img/coins/64x64/6636.png' 
            },
        ],
        search:"",
        curCoin:1
    },
        
    methods: {
        selectCoin: function (coinId) {
            this.curCoin = coinId;
            selectedCoin = coinId;
            setUpTradePrice();
            $('#selectedCoin').text(this.products[coinId].name);
            $('#selectedCoin').prepend("<img class = 'iconImage' src= ' "+ this.products[coinId].icon  + " ' /img>")

            chart.destroy();

            create24HChart(this.products[coinId].tag);
        }   
    },
    computed: {
        filteredCoins() {
            var self = this;
            return this.products.filter(function(product) {
            
                return product.name.toLowerCase().indexOf(self.search.toLowerCase())>=0 ||
                        product.tag.toLowerCase().indexOf(self.search.toLowerCase())>=0;
            });
        }
    }
});
function createChart(xLabels,chartData) {
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xLabels,
            datasets: [{
                label: coins.products[selectedCoin].name,
                data:chartData,
                borderColor: 'rgb(13,203,129)',
                segment: {
                    borderColor: ctx => down(ctx, 'rgb(246,70,93)')
                },
                spanGaps: true
            }]
        },
        options: {
            fill: false,
            interaction: {
              intersect: false
            },
            radius: 0,
        }
    });
}

function setPrice(coinTag,id) {
    $.getJSON("https://api.binance.com/api/v1/ticker/24hr?symbol="  + coinTag  + 'USDT', function(data){
        coins.products[id].price = parseFloat(data.lastPrice).toFixed(4);
            
        coins.products[id].volume = 
        Number("" + parseFloat(data['volume']).toFixed(0)).toLocaleString();
        coins.products[id].change = 
            data.priceChangePercent;
        }).done(function() {

        setUpTradePrice();
        updateCoinProperties(coins.products[selectedCoin].change,coins.products[selectedCoin].high,coins.products[selectedCoin].low,coins.products[selectedCoin].volume);

    })

}



function setPrices() {
    for(var i = 0; i < coins.products.length; i++) {
        setPrice(coins.products[i].tag,i);
    }
    setTimeout(setPrices,5000);
}

function create24HChart(coinTag) {
    getPriceChart(coinTag,96,1);
}

function getPriceChart(coinTag,totalHours,hourIncrement) {
    var xLabels = [];
    var yLabels = [];
    $.getJSON("https://min-api.cryptocompare.com/data/histohour?fsym="+coinTag+"&tsym=USD&limit="+ totalHours +"&aggregate="+hourIncrement+"&e=CCCAGG",function(data){
        
        var high = data.Data[0].close;
        var low = data.Data[0].close;
        
        for(var i = 0; i < totalHours; i++) { 
            var tempTime = timeConverter(data.Data[i].time);
            xLabels.push(tempTime["month"] + "-" + tempTime["date"] + " " + tempTime["hour"] + ":" + tempTime["min"] + "0" + "PST");
            if(data.Data[i].close > high) high = data.Data[i].close;
            if(data.Data[i].close < low) low = data.Data[i].close;
            yLabels.push(data.Data[i].close);
        } 
        coins.products[selectedCoin].high = high;
        coins.products[selectedCoin].low = low;

        }).done(function() {
            createChart(xLabels,yLabels)
            updateCoinProperties(coins.products[selectedCoin].change,coins.products[selectedCoin].high,coins.products[selectedCoin].low,coins.products[selectedCoin].volume);
    })
}

function updateCoinProperties(change,high,low,volume) {
    if(change>0) $("#selectedChange").text("+"+change+"%");
    else $("#selectedChange").text(change+"%");
    $("#selectedHigh").text(high+"$");

    $("#selectedLow").text(low+"$");
    $("#selectedVolume").text(volume+"$");

}
function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan','Fev','Mar','Avr','Mai','Jui','Jui','Aou','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();

    var times = {date: date, month: month, year: year, hour:hour,min:min};

    return times;
}

function getPrice(coinTag) {

    $.getJSON("https://api.binance.com/api/v1/ticker/24hr?symbol="  + coinTag + "USDT", function(data){})

}

function buyCoin() {
    if( isNaN($("#buyAmount").val())||(wallet-coins.products[selectedCoin].price * $("#buyAmount").val())<0 || $("#buyAmount").val()<0) {
        alert("Invalid Buy Order (Exceeds Wallet or Is Not A Number)");
        return;
    }
    wallet -= coins.products[selectedCoin].price * $("#buyAmount").val();

    coins.products[selectedCoin].wallet += parseFloat($("#buyAmount").val());
    setUpAmountOptions();  

    createTransaction(coins.products[selectedCoin].name + '(' + coins.products[selectedCoin].tag + ')',coins.products[selectedCoin].price,$("#buyAmount").val(), getCurrentTime(),'buy');

    $("#buyAmount").val("");
    $("#buyTotal").val("0.0000$");

    chart.options.title.text = (coins.products[selectedCoin].tag +"s in Wallet: " + coins.products[selectedCoin].wallet.toFixed(4) + "    " + "USD in Wallet: " + wallet.toFixed(4));

    chart.update();

}

function sellCoin() {
    if( isNaN($("#sellAmount").val())||(coins.products[selectedCoin].wallet - $("#sellAmount").val())<0 || $("#sellAmount").val()<0 ) {
        alert("Invalid Buy Order (Exceeds Wallet or Is Not A Number)");
        return;
    }
    wallet += coins.products[selectedCoin].price * $("#sellAmount").val();
    coins.products[selectedCoin].wallet-= $("#sellAmount").val(); 
    setUpAmountOptions(); 
    createTransaction(coins.products[selectedCoin].name + '(' + coins.products[selectedCoin].tag + ')',coins.products[selectedCoin].price,$("#sellAmount").val(), getCurrentTime(),'sell');

    $("#sellAmount").val("");
    $("#sellTotal").val("0.0000$");

    chart.options.title.text = (coins.products[selectedCoin].tag +"s in Wallet: " + coins.products[selectedCoin].wallet.toFixed(4) + "    " + "USD in Wallet: " + wallet.toFixed(4));

    chart.update();
}

function setUpAmountOptions() {
    $("#buyOptionOne").val( ((wallet*.25)/ coins.products[selectedCoin].price) );   

    $("#buyOptionTwo").val( ((wallet*.5)/ coins.products[selectedCoin].price));   

        $("#buyOptionThree").val( ((wallet*.75)/ coins.products[selectedCoin].price));   

        $("#buyOptionFour").val( ((wallet)/ coins.products[selectedCoin].price)); 

    $("#sellOptionOne").val( (coins.products[selectedCoin].wallet *.25));   

    $("#sellOptionTwo").val( (coins.products[selectedCoin].wallet *.50));    

        $("#sellOptionThree").val( (coins.products[selectedCoin].wallet *.75));    

        $("#sellOptionFour").val( (coins.products[selectedCoin].wallet ) );  
}

function setUpTradePrice() {
    $("#buyPrice").val(coins.products[selectedCoin].price+"$");
    $("#sellPrice").val(coins.products[selectedCoin].price+"$");
    $("#buyTotal").val("0.0000$");
    $("#sellTotal").val("0.0000$");
    setUpAmountOptions();
}

function getCurrentTime() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //Janvier est 0 !
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    } 
    today = mm + '/' + dd + '/' + yyyy;
    return today;
}

function createTransaction(name,transactionPrice,transactionAmount,transactionDate,type) {


    var myObject = {
        id:transactionVue.transactions.length,
        name:name,
        transactionPrice: transactionPrice,
        transactionAmount: parseFloat(transactionAmount).toFixed(4),
        transactionDate:transactionDate,
        total:(transactionAmount*transactionPrice).toFixed(3)+"$",
        transactionType: type,
    }
    transactionVue.transactions.push(myObject);
}

getPriceChart("BTC",96,1);
setPrices();

$('#buyAmount').bind('input', function() { 
    var totalVal = $("#buyAmount").val() * $("#buyPrice").val();
        $("#buyTotal").val( (($("#buyAmount").val() *                $("#buyPrice").val().replace("$","")).toFixed(4)+"$"));
});

$('#sellAmount').bind('input', function() { 
    var totalVal = $("#sellAmount").val() * $("#sellPrice").val();
        $("#sellTotal").val(($("#sellAmount").val() *                $("#sellPrice").val().replace("$","")).toFixed(4)+"$");
});