/**
 * 反转义
 * @returns {string}
 */
String.prototype.unescapeHTML = function () {
    return this.replace(/&amp;|&lt;|&gt;|&#39;|&quot;/g, function (tag) {
        return ({
            '&amp;': '&',
            '&lt;': '<',
            '&gt;': '>',
            '&#39;': "'",
            '&quot;': '"'
        }[tag] || tag);
    });
};

function unescapeHTML(str) {
   return  str.replace(/&amp;|&lt;|&gt;|&#39;|&quot;/g, function (tag) {
        return ({
            '&amp;': '&',
            '&lt;': '<',
            '&gt;': '>',
            '&#39;': "'",
            '&quot;': '"'
        }[tag] || tag);
    })
}

/**
 * 通过查找item的父索引
 * @param list Array
 * @param item Object
 * @returns {number}
 */
function parentIndex(list, item) {
    for (var i = 0; i < list.length; i++) {
        if (list[i]['id'] === Number(item['pid'])) {
            return i
        }
    }
}

/**
 * 把list的数据,显示出层级的效果,0表示顶层分类
 * [{
 *     name:'西装',
 *     pid:0,
 *     path:'0,父ID',
 *     level:1
 * }]
 * @param list String Json格式的数组字符串
 * @param selectId html里的select元素ID名称
 */
function category(list, selectId) {
    //反转义并转换成数组对象
    list = JSON.parse(list.unescapeHTML())
    // console.log(list)
    //建立空数组
    var l = []
    //循环数组
    for (var i = 0; i < list.length; i++) {
        //如果父ID等于0,则直接添加到l数组里
        if (list[i]['pid'] === 0) {
            l.push(list[i])
        } else {
            //获取父亲的索引
            var pi = parentIndex(l, list[i]) + 1
            //添加到父亲的后面
            l.splice(pi, 0, list[i])
        }
    }
    //根据层级给每一个项添加连接字符'.....|'
    for (var i = 0; i < l.length; i++) {
        var c = ''
        for (var j = 0; j < l[i]['level']; j++) {
            c += ".....|"
        }
        $(selectId).append("<option value='" + l[i]['id'] + '|' + l[i]['path'] + "'>" + '|' + c + l[i]["name"] + "</option>")
    }
}

/**
 * 获取网页参数
 * @param name
 * @returns {string|null}
 */
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return decodeURIComponent(r[2]);
    }
    return null;
}