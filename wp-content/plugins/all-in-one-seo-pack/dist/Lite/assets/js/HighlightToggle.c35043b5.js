import{B as r}from"./Checkbox.01664e13.js";import{B as s}from"./Radio.42b6d623.js";import{_ as i,o as l,c as u,b as c,w as g,e as m,x as d,B as _}from"./_plugin-vue_export-helper.1252226d.js";const f={components:{BaseCheckbox:r,BaseRadio:s},props:{type:{type:String,required:!0},name:{type:String,required:!0},modelValue:{type:[Boolean,String,Event],required:!0},active:Boolean,size:String,round:Boolean},methods:{toggleCheckbox(){this.$refs.toggle.labelToggle()}}};function p(o,t,e,y,B,a){return l(),u("div",{class:_(["aioseo-highlight-toggle",[{active:e.active},{[e.size]:e.size}]]),onClick:t[1]||(t[1]=(...n)=>a.toggleCheckbox&&a.toggleCheckbox(...n))},[(l(),c(d(`base-${e.type}`),{ref:"toggle",name:e.name,modelValue:e.modelValue,size:e.size,round:e.round,"onUpdate:modelValue":t[0]||(t[0]=n=>o.$emit("update:modelValue",n))},{default:g(()=>[m(o.$slots,"default")]),_:3},8,["name","modelValue","size","round"]))],2)}const v=i(f,[["render",p]]);export{v as B};
