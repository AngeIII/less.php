<?php

namespace Less\Node;

class Rule
{
    public function __construct($name, $value, $important, $index)
    {
        $this->name = $name;
        $this->value = ($value instanceof \Less\Node\Value) ? $value : new \Less\Node\Value(array($value));
        $this->important = $important ? ' ' . trim($important) : '';
        $this->index = $index;

        if ($name[0] === '@') {
            $this->variable = true;
        } else {
            $this->variable = false;
        }
    }
}

/*`
(function (tree) {

tree.Rule = function (name, value, important, index) {
    this.name = name;
    this.value = (value instanceof tree.Value) ? value : new(tree.Value)([value]);
    this.important = important ? ' ' + important.trim() : '';
    this.index = index;

    if (name.charAt(0) === '@') {
        this.variable = true;
    } else { this.variable = false }
};
tree.Rule.prototype.toCSS = function (env) {
    if (this.variable) { return "" }
    else {
        return this.name + (env.compress ? ':' : ': ') +
               this.value.toCSS(env) +
               this.important + ";";
    }
};

tree.Rule.prototype.eval = function (context) {
    return new(tree.Rule)(this.name, this.value.eval(context), this.important, this.index);
};

*/