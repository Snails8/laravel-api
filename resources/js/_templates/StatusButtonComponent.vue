<template>
  <button v-bind:class="['btn', column ? 'btn-primary' : 'btn-danger']" v-on:click="handleClick">{{ status[column] }}</button>
</template>
<script>
const axios = require('axios');
export default{
  props: {
    objectId: Number,
    isStatus: Number,
    column: String,
    target: String,
  },

  data(){
    return{
      status:{
        0: '契約中',
        1: '契約済'
      },
    }
  },

  methods:{
    handleClick:function () {
      window.confirm('本当に変更してもよろしいですか？')

      this.column ^= 1;

      // DBの型に合わせる
      let status = (this.column);

      let data = {
        column : status,
      };

      axios.put('/ajax/' + this.target + '/' + this.objectId + '/' + this.column , {data} );
    }
  }
}
</script>


<!--<is-public-component-->
<!--    :object-id="{{ $news->id }}"-->
<!--    :is-public="{{ (int)$news->is_public }}"-->
<!--    :target="{{ json_encode('news') }}" >-->
<!--    :column="is_public"  -->
<!--    :falseText="非公開"  -->
<!--    :trueText="公開中"   -->
<!--</is-public-component>   -->