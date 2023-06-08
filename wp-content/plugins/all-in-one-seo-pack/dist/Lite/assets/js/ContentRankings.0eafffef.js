import{m as S,b as x}from"./vuex.esm-bundler.2e787911.js";import{C as B}from"./index.c8bcf9e5.js";import{C as R}from"./Blur.fd3c040c.js";import{G as P,a as T}from"./Row.3c6833bf.js";import{P as U}from"./PostsTable.80a31d4d.js";import{_ as m,r as e,o as a,b as u,w as o,a as p,d as n,y as _,t as c,c as v,f as y}from"./_plugin-vue_export-helper.1252226d.js";import{C as L}from"./Index.25975920.js";import{R as q}from"./RequiredPlans.7747ff8a.js";import{L as A}from"./WpTable.6ebd2781.js";import"./default-i18n.ab92175e.js";import"./constants.449145d5.js";import"./index.fef507ce.js";import"./SaveChanges.03404395.js";import"./Caret.21cdd163.js";import"./PostTypes.9ab32454.js";import"./Statistic.3c49fce7.js";import"./isArrayLikeObject.da221b94.js";import"./_arrayEach.56a9f647.js";import"./_getAllKeys.cdde2cc1.js";import"./_getTag.2bfb1432.js";import"./_commonjsHelpers.f84db168.js";import"./vue.runtime.esm-bundler.9b388507.js";import"./Tooltip.ce066015.js";import"./ScoreButton.baf8114c.js";import"./Table.9acc0e22.js";import"./Slide.8b22672f.js";import"./helpers.de7566d0.js";import"./RequiresUpdate.52f5acf2.js";import"./postContent.d5640333.js";import"./cleanForSlug.3cf2e377.js";import"./html.14f2a8b9.js";import"./Index.67d5329e.js";const G={components:{CoreAlert:B,CoreBlur:R,GridColumn:P,GridRow:T,PostsTable:U},data(){return{strings:{title:this.$t.__("Content Rankings",this.$td),alert:this.$t.__("The Content Rankings report provides valuable insights into the performance of your content in search results and helps you optimize your posts for better results. This report is generated on a monthly basis, covering the past 12 months leading up to the current month. By regularly reviewing this report, you can identify trends in your post rankings and make informed decisions to improve your content's visibility and ultimately increase rankings in search results.",this.$td)},defaultPages:{rows:[],totals:{page:0,pages:0,total:0}}}},computed:{...S("search-statistics",["data"])}},N={class:"aioseo-search-statistics-content-rankings"},V={class:"aioseo-search-statistics-content-rankings__title"};function D(s,d,h,g,t,f){const r=e("core-alert"),i=e("posts-table"),l=e("grid-column"),w=e("grid-row"),C=e("core-blur");return a(),u(C,null,{default:o(()=>[p("div",N,[n(w,null,{default:o(()=>[n(l,null,{default:o(()=>{var k,$;return[n(r,{class:"description",type:"blue","show-close":""},{default:o(()=>[_(c(t.strings.alert),1)]),_:1}),p("div",V,[p("h2",null,c(t.strings.title),1)]),n(i,{posts:(($=(k=s.data)==null?void 0:k.contentRankings)==null?void 0:$.paginated)||t.defaultPages,columns:["post_title","lastUpdated","loss","drop","performance"],disableSorting:"","show-items-per-page":"","show-table-footer":""},null,8,["posts"])]}),_:1})]),_:1})])]),_:1})}const I=m(G,[["render",D]]);const E={components:{Blur:I,Cta:L,RequiredPlans:q},data(){return{strings:{ctaButtonText:this.$t.sprintf(this.$t.__("Upgrade to %1$s and Unlock Search Statistics",this.$td),"Pro"),ctaHeader:this.$t.sprintf(this.$t.__("Search Statistics is only for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro"),ctaDescription:this.$t.__("Connect your site to Google Search Console to receive insights on how content is being discovered. Identify areas for improvement and drive traffic to your website.",this.$td),thisFeatureRequires:this.$t.__("This feature requires one of the following plans:",this.$td),feature1:this.$t.__("Search traffic insights",this.$td),feature2:this.$t.__("Track page rankings",this.$td),feature3:this.$t.__("Track keyword rankings",this.$td),feature4:this.$t.__("Speed tests for individual pages/posts",this.$td)}}},computed:{...x(["isUnlicensed"])}},H={class:"aioseo-search-statistics-content-rankings"};function O(s,d,h,g,t,f){const r=e("blur"),i=e("required-plans"),l=e("cta");return a(),v("div",H,[n(r),n(l,{"cta-link":s.$links.getPricingUrl("search-statistics","search-statistics-upsell","content-rankings"),"button-text":t.strings.ctaButtonText,"learn-more-link":s.$links.getUpsellUrl("search-statistics","content-rankings","home"),"feature-list":[t.strings.feature1,t.strings.feature2,t.strings.feature3,t.strings.feature4],"align-top":""},{"header-text":o(()=>[_(c(t.strings.ctaHeader),1)]),description:o(()=>[n(i,{"core-feature":["search-statistics","content-rankings"]}),_(" "+c(t.strings.ctaDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list"])])}const b=m(E,[["render",O]]),z={mixins:[A],components:{ContentRankings:b,Lite:b}},F={class:"aioseo-search-statistics-content-rankings"};function M(s,d,h,g,t,f){const r=e("content-rankings",!0),i=e("lite");return a(),v("div",F,[s.shouldShowMain("search-statistics","content-rankings")?(a(),u(r,{key:0})):y("",!0),s.shouldShowUpgrade("search-statistics","content-rankings")||s.shouldShowLite?(a(),u(i,{key:1})):y("",!0)])}const Ct=m(z,[["render",M]]);export{Ct as default};
