<div class="magento-default-index" id="app">
<!--    <h1><b>{{message}}</b></h1>-->
    <ul>
        <li v-for="item in news">{{item.title}}</li>
    </ul>
</div>
<script>
    var vue = new Vue({
        el:'#app',
        data:{
            message:'Hello vue !',
            news:[]
        },
        mounted :function(){
            var self = this;
            axios.get('api/news').then(function(res){
                setTimeout(function(){
                    self.news = [].concat(res.data,self.news)

                },5000)
            })
        }
    })
</script>