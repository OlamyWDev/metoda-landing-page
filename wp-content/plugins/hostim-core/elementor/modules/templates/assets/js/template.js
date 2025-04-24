!(function ($, $elementor, $hostim) {
    "use strict";
    
    var $config = {};
    var $append = '<div class="elementor-add-section-area-button dl_templates_add_button"><img src="'+hostimEditor.templateLogo+'" /></div>';
    
    window.liteTranslated = function (e, t) {
        return elementorCommon.translate(e, null, t, hostimEditor.i18n)
    };
    
    var $app = {
        Views: {},
        Models: {},
        Collections: {},
        Behaviors: {},
        Layout: null,
        Manager: null
    };

    var $modal, $search, $dlist, $loader, $eleDialogsM;
    var tabs = {

    };

    var $responsive = {
        desktop: "100%",
        tab: "768px",
        mobile: "360px"
    };

    $app.Models.Template = Backbone.Model.extend({
        defaults: {
            template_id: 0,
            title: "",
            type: "",
            thumbnail: "",
            url: "",
            liveurl: "",
            favorite: "",
            tags: [],
            isPro: !1
        }
    }), 
    $app.Collections.Template = Backbone.Collection.extend({
        model: $app.Models.Template
    }), 
    $app.Behaviors.InsertTemplate = Marionette.Behavior.extend({
        ui: {
            insertButton: ".liteTemplateLibrary_insert-button"
        },
        events: {
            "click @ui.insertButton": "onInsertButtonClick"
        },
        onInsertButtonClick: function() {
            $hostimTemp.insertTemplate({
                model: this.view.model
            })
        }
    }), 
    $app.Views.EmptyTemplateCollection = Marionette.ItemView.extend({
        id: "elementor-template-library-templates-empty",
        template: "#hostim-liteTemplateLibrary_empty",
        ui: {
            title: ".elementor-template-library-blank-title",
            message: ".elementor-template-library-blank-message"
        },
        modesStrings: {
            empty: {
                title: liteTranslated("templatesEmptyTitle"),
                message: liteTranslated("templatesEmptyMessage")
            },
            noResults: {
                title: liteTranslated("templatesNoResultsTitle"),
                message: liteTranslated("templatesNoResultsMessage")
            }
        },
        getCurrentMode: function() {
            return $hostimTemp.getFilter("text") ? "noResults" : "empty"
        },
        onRender: function() {
            var e = this.modesStrings[this.getCurrentMode()];
            this.ui.title.html(e.title), this.ui.message.html(e.message)
        }
    }), 
    $app.Views.Loading = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_loading",
        id: "liteTemplateLibrary_loading"
    }), 
    $app.Views.Logo = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-logo",
        className: "liteTemplateLibrary_header-logo",
        templateHelpers: function() {
            return {
                title: this.getOption("title")
            }
        }
    }), 
    $app.Views.BackButton = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-back",
        id: "elementor-template-library-header-preview-back",
        className: "liteTemplateLibrary_header-back",
        events: function() {
            return {
                click: "onClick"
            }
        },
        onClick: function() {
            $hostimTemp.showTemplatesView()
        }
    }), 
    $app.Views.Menu = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-menu",
        id: "elementor-template-library-header-menu",
        className: "liteTemplateLibrary_header-menu",
        templateHelpers: function() {
            return $hostimTemp.getTabs()
        },
        ui: {
            menuItem: ".elementor-template-library-menu-item"
        },
        events: {
            "click @ui.menuItem": "onMenuItemClick"
        },
        onMenuItemClick: function(e) {
            $hostimTemp.setFilter("tags", ""), 
            $hostimTemp.setFilter("text", ""), 
            $hostimTemp.setFilter("type", e.currentTarget.dataset.tab, !0), $hostimTemp.showTemplatesView()
        }
    }), 
    $app.Views.ResponsiveMenu = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-menu-responsive",
        id: "elementor-template-library-header-menu-responsive",
        className: "liteTemplateLibrary_header-menu-responsive",
        ui: {
            items: "> .elementor-component-tab"
        },
        events: {
            "click @ui.items": "onTabItemClick"
        },
        onTabItemClick: function(t) {
            var $a = $(t.currentTarget),
                $n = $a.data("tab");
            $hostimTemp.channels.tabs.trigger("change:device", $n, $a)
        }
    }), 
    $app.Views.Actions = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-actions",
        id: "elementor-template-library-header-actions",
        ui: {
            sync: "#liteTemplateLibrary_header-sync i"
        },
        events: {
            "click @ui.sync": "onSyncClick"
        },
        onSyncClick: function() {
            var e = this;
            e.ui.sync.addClass("eicon-animation-spin"), $hostimTemp.requestLibraryData({
                onUpdate: function() {
                    e.ui.sync.removeClass("eicon-animation-spin"), $hostimTemp.updateBlocksView()
                },
                forceUpdate: !0,
                forceSync: !0
            })
        }
    }), 
    $app.Views.InsertWrapper = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_header-insert",
        id: "elementor-template-library-header-preview",
        behaviors: {
            insertTemplate: {
                behaviorClass: $app.Behaviors.InsertTemplate
            }
        }
    }), 
    $app.Views.Preview = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_preview",
        className: "liteTemplateLibrary_preview",
        ui: function() {
            return {
                img: "> img"
            }
        },
        onRender: function() {
            this.ui.img.attr("src", this.getOption("url")).hide();
            var e = this,
                t = (new $app.Views.Loading).render();
            this.$el.append(t.el), this.ui.img.on("load", function() {
                e.$el.find("#liteTemplateLibrary_loading").remove(), e.ui.img.show()
            })
        }
    }), 
    $app.Views.TemplateCollection = Marionette.CompositeView.extend({
        template: "#hostim-liteTemplateLibrary_templates",
        id: "liteTemplateLibrary_templates",
        className: function() {
            return "liteTemplateLibrary_templates liteTemplateLibrary_templates--" + $hostimTemp.getFilter("type")
        },
        childViewContainer: "#liteTemplateLibrary_templates-list",
        emptyView: function() {
            return new $app.Views.EmptyTemplateCollection
        },
        ui: {
            templatesWindow: ".liteTemplateLibrary_templates-window",
            textFilter: "#liteTemplateLibrary_search",
            tagsFilter: "#hostim_temp_filter-tags",
            filterBar: "#liteTemplateLibrary_toolbar-filter",
            counter: "#liteTemplateLibrary_toolbar-counter"
        },
        events: {
            "input @ui.textFilter": "onTextFilterInput",
            "click @ui.tagsFilter li": "onTagsFilterClick"
        },
        getChildView: function(e) {
            return $app.Views.Template
        },
        initialize: function() {
            this.listenTo($hostimTemp.channels.templates, "filter:change", this._renderChildren)
        },
        filter: function(e) {
            var t = $hostimTemp.getFilterTerms(),
                a = !0;
            return _.each(t, function(t, n) {
                var r = $hostimTemp.getFilter(n);
                if (r && t.callback) {
                    var l = t.callback.call(e, r);
                    return l || (a = !1), l
                }
            }), a
        },
        setMasonrySkin: function() {
            if ("section" === $hostimTemp.getFilter("type")) {
                var e = new elementorModules.utils.Masonry({
                    container: this.$childViewContainer,
                    items: this.$childViewContainer.children()
                });
                this.$childViewContainer.imagesLoaded(e.run.bind(e))
            }
        },
        onRenderCollection: function() {
            this.setMasonrySkin(), this.updatePerfectScrollbar(), this.setTemplatesFoundText()
        },
        setTemplatesFoundText: function() {
            var text;
            var e = $hostimTemp.getFilter("type"),
                t = this.children.length;
            text = "<strong>" + t + "</strong>", text += "section" === e ? " block" : " " + e, t > 1 && (text += "s"), text += " found", this.ui.counter.html(text)
        },
        onTextFilterInput: function() {
            var e = this;
            _.defer(function() {
                $hostimTemp.setFilter("text", e.ui.textFilter.val())
            })
        },
        onTagsFilterClick: function(t) {
            var $a = $(t.currentTarget),
                $n = $a.data("tag");
            $hostimTemp.setFilter("tags", $n), $a.addClass("active").siblings().removeClass("active"), n = n ? $hostimTemp.getTags()[$n] : "Filter", this.ui.filterBar.find(".hostim_temp_filter-btn").html($n + ' <i class="eicon-caret-down"></i>')
        },
        updatePerfectScrollbar: function() {
            this.perfectScrollbar || (this.perfectScrollbar = new PerfectScrollbar(this.ui.templatesWindow[0], {
                suppressScrollX: !0
            })), this.perfectScrollbar.isRtl = !1, this.perfectScrollbar.update()
        },
        setTagsFilterHover: function() {
            var e = this;
            e.ui.filterBar.hoverIntent(function() {
                e.ui.tagsFilter.addClass("hostim_temp_filter-show"), e.ui.filterBar.find(".hostim_temp_filter-btn i").addClass("eicon-caret-down").removeClass("eicon-caret-right")
            }, function() {
                e.ui.tagsFilter.removeClass("hostim_temp_filter-show");
                e.ui.tagsFilter.addClass("hostim_temp_filter-hide"), e.ui.filterBar.find(".hostim_temp_filter-btn i").addClass("eicon-caret-right").removeClass("eicon-caret-down")
            }, {
                sensitivity: 50,
                interval: 150,
                timeout: 100
            })
        },
        onRender: function() {
            this.setTagsFilterHover(), this.updatePerfectScrollbar()
        }
    }), 
    $app.Views.Template = Marionette.ItemView.extend({
        template: "#hostim-liteTemplateLibrary_template",
        className: "liteTemplateLibrary_template",
        ui: {
            previewButton: ".liteTemplateLibrary_preview-button, .liteTemplateLibrary_template-preview"
        },
        events: {
            "click @ui.previewButton": "onPreviewButtonClick"
        },
        behaviors: {
            insertTemplate: {
                behaviorClass: $app.Behaviors.InsertTemplate
            }
        },
        onPreviewButtonClick: function() {
            $hostimTemp.showPreviewView(this.model)
        }
    }), 
    $app.Modal = elementorModules.common.views.modal.Layout.extend({
        getModalOptions: function() {
            return {
                id: "liteTemplateLibrary_modal",
                hide: {
                    onOutsideClick: !1,
                    onEscKeyPress: !0,
                    onBackgroundClick: !1
                }
            }
        },
        getTemplateActionButton: function(e) {
            var t = e.isPro && !hostimEditor.hasPro ? "pro-button" : "insert-button";
            var viewId, template;
            return viewId = "#hostim-liteTemplateLibrary_" + t, template = Marionette.TemplateCache.get(viewId), Marionette.Renderer.render(template)
        },
        showLogo: function(e) {
            this.getHeaderView().logoArea.show(new $app.Views.Logo(e))
        },
        showDefaultHeader: function() {
            this.showLogo({
                title: "TEMPLATES"
            });
            var e = this.getHeaderView();
            e.tools.show(new $app.Views.Actions), e.menuArea.show(new $app.Views.Menu)
        },
        showPreviewView: function(e) {
            var t = this.getHeaderView();
            t.menuArea.show(new $app.Views.ResponsiveMenu), t.logoArea.show(new $app.Views.BackButton), t.tools.show(new $app.Views.InsertWrapper({
                model: e
            })), this.modalContent.show(new $app.Views.Preview({
                url: e.get("url")
            }))
        },
        showTemplatesView: function(e) {
            this.showDefaultHeader(), this.modalContent.show(new $app.Views.TemplateCollection({
                collection: e
            }))
        }
    });
 
    var $hostimInt = {
        init: function(){

        }
    },
    $hostimLoad = {
        init: function(){

        }
    }, 
    $hostimTemp = {
        init: function(){
            window.elementor.on("preview:loaded", $hostimTemp.onEditorLoaded), $hostimInt.init(), $hostimLoad.init();
           
        },
        onEditorLoaded: function () {
            let $el =  window.elementor.$previewContents;
            let $time = setInterval(() => {
                $el.find(".elementor-add-new-section").length && ($hostimTemp.initAddButton( $el ), clearInterval($time));
            }, 100);

            $el.on("click.onAddTemplateButton", ".dl_templates_add_button", $hostimTemp.showModal), $hostimTemp.channels.tabs.on("change:device", $hostimTemp.changeTab)
        },
        initAddButton: function ( $el ) {
            let $newSection = $el.find(".elementor-add-new-section");
            let $top = $el.closest(".elementor-top-section");
            let $dl = $newSection.find('.elementor-add-section-drag-title');
            $dl.length && !$el.find(".dl_templates_add_button").length && $dl.before($append); 
            $el.on("click.onAddElement", ".elementor-editor-section-settings .elementor-editor-element-add", $hostimTemp.appendCheck);
        },

        appendCheck : function(){
            let $el =  window.elementor.$previewContents;
            let $top = $el.closest(".elementor-top-section"),
                $id = $top.data("id"),
                $dl = $top.find('.elementor-add-section-drag-title')
                $child = $dl.documents.getCurrent().container.children,
                $section = $top.prev(".elementor-add-section");
                $child && _.each($child, function(e, t) {
                    $id === e.id && (this.atIndex = t)
                }), 
                $section.find(".dl_templates_add_button").length || $section.find('.elementor-add-new-section > .elementor-add-section-drag-title').before($append);
        },

        changeTab: function(t, i){
            i.addClass("elementor-active").siblings().removeClass("elementor-active");
            var a = $responsive[t] || $responsive.desktop;
            $(".liteTemplateLibrary_preview").css("width", a)

            
        },
        showModal: function() {
            $hostimTemp.getModal().showModal(), $hostimTemp.showTemplatesView()
        },
        closeModal : function() {
            $hostimTemp.getModal().hideModal()
        },
        getModal : function() {
            return $modal || ($modal = new $app.Modal), $modal
        },
        showTemplatesView : function() {
            let $this = this;
            $hostimTemp.setFilter("tags", "", !0), $hostimTemp.setFilter("text", "", !0), $loader ? $hostimTemp.getModal().showTemplatesView($loader) : $hostimTemp.loadTemplates(function() {
                $this.getModal().showTemplatesView($loader)
            })
        },
        atIndex : -1,
        channels : {
            tabs: Backbone.Radio.channel("tabs"),
            templates: Backbone.Radio.channel("templates")
        },
        updateBlocksView : function() {
            $hostimTemp.setFilter("tags", "", !0), $hostimTemp.setFilter("text", "", !0), $hostimTemp.getModal().showTemplatesView(c)
        },
        setFilter : function(e, t, i) {
            $hostimTemp.channels.templates.reply("filter:" + e, t), i || $hostimTemp.channels.templates.trigger("filter:change")
        },
        getFilter : function(e) {
            return $hostimTemp.channels.templates.request("filter:" + e)
        },
        getFilterTerms : function() {
            return {
                tags: {
                    callback: function(e) {
                        return _.any(this.get("tags"), function(t) {
                            return t.indexOf(e) >= 0
                        })
                    }
                },
                text: {
                    callback: function(e) {
                        return e = e.toLowerCase(), this.get("title").toLowerCase().indexOf(e) >= 0 || _.any(this.get("tags"), function(t) {
                            return t.indexOf(e) >= 0
                        })
                    }
                },
                type: {
                    callback: function(e) {
                        return this.get("type") === e
                    }
                }
            }
        },

        getTabs : function() {
            var e = this.getFilter("type");
            return (
                (tabs = { section: { title: "Blocks" }, page: { title: "Pages" } }),
                _.each(tabs, function (t, i) {
                    e === i && (tabs[e].active = !0);
                }),
                { tabs: tabs }
            );
        },
        getTags : function() {
            return $search
        },
        getTypeTags : function() {
            var e = this.getFilter("type");
            return $dlist[e]
        }, 
        showTemplatesView : function() {
            let $this = this;
            $hostimTemp.setFilter("tags", "", !0), $hostimTemp.setFilter("text", "", !0), $loader ? $hostimTemp.getModal().showTemplatesView($loader) : $hostimTemp.loadTemplates(function() {
                $hostimTemp.getModal().showTemplatesView($loader)
            })
        },
        showPreviewView : function(e) {
            $hostimTemp.getModal().showPreviewView(e)
        },
        loadTemplates : function(e) {
            let $this = this;
            $hostimTemp.requestLibraryData({
                onBeforeUpdate: $hostimTemp.getModal().showLoadingView.bind($hostimTemp.getModal()),
                onUpdate: function() {
                    $hostimTemp.getModal().hideLoadingView(), e
                }
            })
        },
        requestLibraryData : function(e) {
            if ($loader && !e.forceUpdate) return void(e.onUpdate && e.onUpdate());
            e.onBeforeUpdate && e.onBeforeUpdate();
            var t = {
                data: {},
                success: function(t) {
                    $loader = new $app.Collections.Template(t.templates), t.tags && ($search = t.tags), t.type_tags && ($dlist = t.type_tags), e.onUpdate && e.onUpdate()
                }
            };
            e.forceSync && (t.data.sync = !0), elementorCommon.ajax.addRequest("get_lite_library_data", t)
        },
        requestTemplateData : function(e, t) {
            var $dat = {
                unique_id: e,
                data: {
                    edit_mode: !0,
                    display: !0,
                    template_id: e
                }
            };
            t && jQuery.extend(!0, $dat, $elementor), elementorCommon.ajax.addRequest("get_lite_template_data", $dat)
        },
        insertTemplate : function(e) {
            var t = e.model,
                i = $hostimTemp;
            i.getModal().showLoadingView(), i.requestTemplateData(t.get("template_id"), {
                success: function(e) {
                    i.getModal().hideLoadingView(), i.getModal().hideModal();
                    var a = {}; - 1 !== i.atIndex && (a.at = i.atIndex), $e.run("document/elements/import", {
                        model: t,
                        data: e,
                        options: a
                    }), i.atIndex = -1
                },
                error: function(e) {
                    i.showErrorDialog(e)
                },
                complete: function(e) {
                    i.getModal().hideLoadingView(), window.elementor.$previewContents.find(".elementor-add-section .elementor-add-section-close").click()
                }
            })
        },
        showErrorDialog : function(e) {
            if ("object" == typeof e) {
                var t = "";
                _.each(e, function(e) {
                    t += "<div>" + e.message + ".</div>"
                }), e = t
            } else e ? e += "." : e = "<i>&#60;The error message is empty&#62;</i>";
            this.getErrorDialog().setMessage('The following error(s) occurred while processing the request:<div id="elementor-template-library-error-info">' + e + "</div>").show()
        },
        getErrorDialog : function() {
            return $eleDialogsM || ($eleDialogsM = elementorCommon.dialogsManager.createWidget("alert", {
                id: "elementor-template-library-error-dialog",
                headerMessage: "An error occurred"
            })), $eleDialogsM
        }
    };
   
    // load elementor editor
    $(window).on("elementor:init", $hostimTemp.init);

    $hostim.library = $hostimTemp;
    window.hostim = $hostim;

})(jQuery, window.elementor, window.hostim || {});

