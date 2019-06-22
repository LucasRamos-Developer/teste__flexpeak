<template id="modal-template">
  <transition name="modal">
    <div class="modal-overlay">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <slot name="header">
              <h5 class="modal-title">Modal title</h5>
            </slot>
            <button type="button" class="close" @click="$emit('close')">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
  export default {
    template: 'modal-template'
  }
</script>
