import{b as k}from"./breadcrumb.af1b015e.js";import{_ as y}from"./paginator.90c794e8.js";import{c as i,r as u,a as e,b as s,d as o,e as t,u as a,F as _,g,C as w,t as l,w as v}from"./main.a4388b13.js";const x={class:"card shadow col-lg-10 mx-auto"},D={class:"card-body"},C={class:"table-responsive"},N={class:"table"},B=t("thead",null,[t("tr",null,[t("th",null,"Reference"),t("th",null,"Amount"),t("th",null,"Status"),t("th",null,"Date"),t("th",null,"Actions")])],-1),L={key:0},S=t("i",{class:"fa fa-edit"},null,-1),V={key:1},W=t("tr",null,[t("td",{colspan:"10",class:"text-muted text-center"},"No deposits found")],-1),j=[W],A={key:0,class:"d-flex justify-content-center"},O={name:"index",props:{deposits:Object},setup(h){const d=h,r=i(()=>d.deposits.data),m=i(()=>d.deposits.links);return(c,F)=>{const p=u("Head"),f=u("InertiaLink");return e(),s(_,null,[o(p,{title:"Withdrawals"}),o(k,{title:"Withdrawals",crumbs:["Dashboard","Withdrawals"]}),t("div",x,[t("div",D,[t("div",C,[t("table",N,[B,a(r).length?(e(),s("tbody",L,[(e(!0),s(_,null,g(a(r),(n,b)=>(e(),s("tr",{key:b},[t("td",null,l(n.reference),1),t("td",null,l(c.format_money(n.amount)),1),t("td",null,l(n.status),1),t("td",null,l(new Date(n.created_at).toDateString()),1),t("td",null,[o(f,{href:c.route("admin.deposits.edit",n.id),class:"btn btn-outline-primary btn-sm"},{default:v(()=>[S]),_:2},1032,["href"])])]))),128))])):(e(),s("tbody",V,j))])]),a(r).length?(e(),s("div",A,[o(y,{links:a(m)},null,8,["links"])])):w("",!0)])])],64)}}};export{O as default};