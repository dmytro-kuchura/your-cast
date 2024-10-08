! function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? t(require("jquery")) : t(jQuery)
}(function(s) {
    var r = function(t, e) {
        this.$element = s(t), this.options = s.extend({}, r.DEFAULTS, this.dataOptions(), e), this.init()
    };
    r.DEFAULTS = {
        from: 0,
        to: 0,
        speed: 1e3,
        refreshInterval: 100,
        decimals: 0,
        formatter: function(t, e) {
            return t.toFixed(e.decimals)
        },
        onUpdate: null,
        onComplete: null
    }, r.prototype.init = function() {
        this.value = this.options.from, this.loops = Math.ceil(this.options.speed / this.options.refreshInterval), this.loopCount = 0, this.increment = (this.options.to - this.options.from) / this.loops
    }, r.prototype.dataOptions = function() {
        var t = {
                from: this.$element.data("from"),
                to: this.$element.data("to"),
                speed: this.$element.data("speed"),
                refreshInterval: this.$element.data("refresh-interval"),
                decimals: this.$element.data("decimals")
            },
            e = Object.keys(t);
        for (var o in e) {
            var i = e[o];
            void 0 === t[i] && delete t[i]
        }
        return t
    }, r.prototype.update = function() {
        this.value += this.increment, this.loopCount++, this.render(), "function" == typeof this.options.onUpdate && this.options.onUpdate.call(this.$element, this.value), this.loopCount >= this.loops && (clearInterval(this.interval), this.value = this.options.to, "function" == typeof this.options.onComplete && this.options.onComplete.call(this.$element, this.value))
    }, r.prototype.render = function() {
        var t = this.options.formatter.call(this.$element, this.value, this.options);
        this.$element.text(t)
    }, r.prototype.restart = function() {
        this.stop(), this.init(), this.start()
    }, r.prototype.start = function() {
        this.stop(), this.render(), this.interval = setInterval(this.update.bind(this), this.options.refreshInterval)
    }, r.prototype.stop = function() {
        this.interval && clearInterval(this.interval)
    }, r.prototype.toggle = function() {
        this.interval ? this.stop() : this.start()
    }, s.fn.countTo = function(n) {
        return this.each(function() {
            var t = s(this),
                e = t.data("countTo"),
                o = "object" == typeof n ? n : {},
                i = "string" == typeof n ? n : "start";
            (!e || "object" == typeof n) && (e && e.stop(), t.data("countTo", e = new r(this, o))), e[i].call(e)
        })
    }
});
