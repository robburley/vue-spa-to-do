<template>
    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                Filter
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Priority</label>

                            <select name="priority" class="form-control" v-model="filters.priority" @change="filterChanged">
                                <option value="0">Please Select</option>
                                <option value="3">Low</option>
                                <option value="2">Medium</option>
                                <option value="1">High</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              filters: {
                  priority: 0
              }
          }
        },

        methods: {
            filterChanged() {
                Event.$emit('filtered', this.filters);
            }
        }
    }
</script>
