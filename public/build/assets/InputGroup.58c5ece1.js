import{a as d,b as u,p as a,v as n,d as l,e as i,i as s,t as r,n as c}from"./main.2ec1ac8a.js";import{_ as f}from"./error.51fe4e46.js";import{_ as p}from"./FormInput.2f97439c.js";import{_ as y}from"./FormButton.62df0933.js";import{_ as g}from"./FormLabel.880193f6.js";const b={class:"input-group auth-pass-inputgroup"},v={name:"InputGroup",props:{type:{type:String},name:{type:String},text:{type:String},label:{type:String},icon:{type:String},placeholder:{type:String,default:"Enter Password"},id:{type:String},modelValue:null},emits:["update:modelValue","buttonClicked"],setup(e){return(o,t)=>(d(),u("div",null,[a(l(g,{label:e.label,for:e.id},null,8,["label","for"]),[[n,e.label]]),i("div",b,[l(p,{type:e.type,id:e.id,name:e.name,placeholder:e.placeholder,modelValue:e.modelValue,"onUpdate:modelValue":t[0]||(t[0]=m=>o.$emit("update:modelValue",m))},null,8,["type","id","name","placeholder","modelValue"]),l(y,{class:"btn btn-light shadow-none ms-0",type:"button",onButtonClicked:t[1]||(t[1]=()=>o.$emit("buttonClicked"))},{default:s(()=>[a(i("span",null,r(e.text),513),[[n,e.text!="undefined"||e.text.length]]),a(i("i",{class:c(e.icon)},null,2),[[n,e.icon]])]),_:1})]),l(f,{name:e.name},null,8,["name"])]))}};export{v as _};
