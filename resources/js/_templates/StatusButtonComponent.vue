<template>
  <button v-bind:class="['btn', column ? 'btn-primary' : 'btn-danger']" v-on:click="handleClick">{{ status[is_status] }}</button>
</template>
<script>
const axios = require('axios');
export default{
  props: {
    objectId: Number,
    isStatus: Number,
    target: String,
    column: String,
    falseText: String,
    trueText: String
  },

  data(){
    return{
      object_id: Number(this.objectId),
      is_status: Number(this.isStatus),

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
      let status = (this.is_status);

      let data = {
        column : status,
      };

      axios.put('/ajax/' + this.target + '/' + this.object_id + '/' + this.column , {data} );
    }
  }
}
</script>


<!--TODO:: 値がうまく渡らない -->
<!--<status-button-component-->
<!--    :object-id="{{ $news->id }}"-->
<!--    :is-public="{{ (int)$news->is_public }}"-->
<!--    :target="{{ json_encode('news') }}"-->
<!--    column="is_public"-->
<!--    false-text="非公開"-->
<!--    true-text="公開中"-->
<!--&gt;-->