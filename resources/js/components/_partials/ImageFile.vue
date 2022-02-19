<template>
  <div>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" :id=id :name=name accept="image/*" class="custom-file-input form-control-file" lang="ja" v-on:change="handleChange" />
        <label class="custom-file-label" :for=id>{{ label }}</label>
      </div>
      <div class="input-group-append">
        <button type="button" class="btn btn-outline-secondary reset" style="font-size: 12px;" v-on:click="remove">取消</button>
      </div>
    </div>
    <div class="input-group">
      <div v-if="preview">
        <img id="img-upload" class="img-thumbnail mt-1 img-upload" v-bind:src="preview" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: String,
    id: String,
    imagePath: String,
  },

  data:function () {
    return {
      preview: '',
      label: 'ファイル選択',
    }
  },

  methods: {
    handleChange: function (e) {
      let files = e.target.files || e.dataTransfer.files;

      this.label = files[0].name;

      let reader = new FileReader();
      reader.onload = (e) => {
        this.preview = e.target.result;
      };
      reader.readAsDataURL(files[0]);

      // 親コンポーネントにimageFilesを返す
      this.$emit('sendImageFilesToParent', files);
    },

    remove() {
      const file = document.getElementById(this.id);

      file.value = '';
      this.label = 'ファイル選択...';
      this.preview = '';
    },
  },
}
</script>