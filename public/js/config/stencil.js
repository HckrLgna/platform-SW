/*! JointJS+ v3.5.0 - HTML5 Diagramming Framework - TRIAL VERSION

Copyright (c) 2022 client IO

 2022-10-13


This Source Code Form is subject to the terms of the JointJS+ Trial License
, v. 2.0. If a copy of the JointJS+ License was not distributed with this
file, You can obtain one at http://jointjs.com/license/rappid_v2.txt
 or from the JointJS+ archive as was distributed by client IO. See the LICENSE file.*/


var App = App || {};
App.config = App.config || {};

(function() {

    'use strict';

    App.config.stencil = {};

    App.config.stencil.groups = {
        standard: { index: 1, label: 'Standard shapes' },
    };

    App.config.stencil.shapes = {};

    App.config.stencil.shapes.standard = [
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Rectangle',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        {
            type: 'standard.Ellipse',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Ellipse',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'ellipse',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        {
            type: 'app.RectangularModel',
            size: { width: 40, height: 30 },
            allowOrthogonalResize: false,
            attrs: {
                root: {
                    dataTooltip: 'Rectangle with ports',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    rx: 2,
                    ry: 2,
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            },
            ports: {
                items: [
                    { group: 'in' },
                    { group: 'in' },
                    { group: 'out' }
                ]
            }
        },
        {
            type: 'app.CircularModel',
            size: { width: 5, height: 3 },
            allowOrthogonalResize: false,
            attrs: {
                root: {
                    dataTooltip: 'Ellipse with ports',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0',
                },
                label: {
                    text: 'ellipse',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            },
            ports: {
                items: [
                    { group: 'in' },
                    { group: 'in' },
                    { group: 'out' }
                ]
            }
        },
        {
            type: 'standard.Polygon',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Rhombus',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    refPoints: '50,0 100,50 50,100 0,50',
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'rhombus',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        {
            type: 'standard.Cylinder',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Cylinder',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                top: {
                    fill: '#31d0c6',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'cylinder',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        {
            type: 'standard.HeaderedRectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Rectangle with header',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0',
                    height: 20
                },
                bodyText: {
                    textWrap: {
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie.',
                        width: -10,
                        height: -20,
                        ellipsis: true
                    },
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY2: 12,
                },
                headerText: {
                    text: 'header',
                    fill: '#f6f6f6',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY: 12
                }
            }
        }
    ];


})();
