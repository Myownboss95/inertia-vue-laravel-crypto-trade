import{s as u,i as g,r as x,a as l,b as m,e,d as i,u as o,w as _,j as V,h as d}from"./main.a4388b13.js";import{_ as k}from"./FormGroup.4594be7e.js";import{_ as f}from"./InputGroup.914f9ff9.js";import{_ as B}from"./FormButton.1c8871a2.js";import"./FormLabel.115ae360.js";import"./FormInput.7b1a5695.js";import"./error.e7db4921.js";const C={class:"auth-content my-auto"},U=e("div",{class:"text-center"},[e("h5",{class:"mb-0"},"Register Account"),e("p",{class:"text-muted mt-2"},"Get a trading account with us.")],-1),E=["onSubmit"],N=e("div",{class:"mb-4"},[e("p",{class:"text-muted"},[d(" By registering you agree to our "),e("a",{href:"#",class:"text-primary"},"Terms of Use")])],-1),$={key:0,class:"spinner-border spinner-border-sm"},A={key:1},R={class:"mt-5 text-center"},S={class:"text-muted mb-0"},T=d(" Already have an account ? "),j=d(" Login "),D={name:"register",props:["flash"],setup(h){var p;const w=h,n=u("password"),r=u("mdi mdi-eye-outline"),c=()=>{console.log("here"),n.value=n.value=="password"?"text":"password",r.value=r.value=="mdi mdi-eye-outline"?"mdi mdi-mdi-eye-off-outline":"mdi mdi-mdi-eye-outline"},s=g({email:((p=w.flash)==null?void 0:p.email)||"",password:"",password_confirmation:""}),y=()=>{s.post(route("register"))};return(b,t)=>{const v=x("inertia-link");return l(),m("div",C,[U,e("form",{class:"mt-4 pt-2",onSubmit:V(y,["prevent"])},[i(k,{label:"Email",placeholder:"you@example.com",modelValue:o(s).email,"onUpdate:modelValue":t[0]||(t[0]=a=>o(s).email=a),name:"email"},null,8,["modelValue"]),i(f,{type:n.value,class:"mb-3",label:"Password",placeholder:"Enter password",modelValue:o(s).password,"onUpdate:modelValue":t[1]||(t[1]=a=>o(s).password=a),icon:r.value,onButtonClicked:c,name:"password"},null,8,["type","modelValue","icon"]),i(f,{type:n.value,class:"mb-3",label:"Confirm password",placeholder:"Confirm password",modelValue:o(s).password_confirmation,"onUpdate:modelValue":t[2]||(t[2]=a=>o(s).password_confirmation=a),icon:r.value,onButtonClicked:c,name:"password_confirmation"},null,8,["type","modelValue","icon"]),N,i(B,{type:"submit",class:"btn btn-primary w-100 waves-effect waves-light"},{default:_(()=>[o(s).processing?(l(),m("span",$)):(l(),m("span",A,"Register"))]),_:1})],40,E),e("div",R,[e("p",S,[T,i(v,{href:b.route("login"),class:"text-primary fw-semibold"},{default:_(()=>[j]),_:1},8,["href"])])])])}}};export{D as default};