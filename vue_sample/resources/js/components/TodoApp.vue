<template>
    <div>
        <h1>Todo</h1>
		<ul>
			<li v-for="(item, index) in items" v-bind:key="index">{{ item }}</li>
		</ul>
		<input type="text" ref="inputValue" />
		<input type="button" v-on:click="onClickBtnAdd" value="Add" />
    </div>
</template>

<style>
	h1 {
		color: green;
	}
</style>

<script>
	var _items = ["aaa", "bbb"]

	export default {

		data() {
			return {
				items : _items
			}
		},

        mounted() {
            console.log('Component mounted.')
		},

		methods: {
		
			onClickBtnAdd() {
				let inputValue = this.$refs.inputValue.value
				this.$refs.inputValue.value = ""
				
				_items.push(inputValue)
				
			}

		}
    }
</script>
