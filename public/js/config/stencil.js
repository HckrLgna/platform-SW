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
        fsa: { index: 2, label: 'State machine' },
    };

    App.config.stencil.shapes = {};

    App.config.stencil.shapes.standard = [
        //container web
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Container web',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/container-web.svg'
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
                label: {
                    text: 'Description of web browser container role',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'Container',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //person
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Person',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/person.svg'
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
                label: {
                    text: 'Description of person.',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'Person name.',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //database
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Database',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/database.svg'
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
                label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'Description of storage.',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //External software
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'External software',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/external-system.svg'
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
                label: {
                    text: 'Description of external software system.',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'External system name.',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //Component name
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Component',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/component.svg'
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
                label: {
                    text: 'Description of component',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'Component name.',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //System name
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'System name',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/system.svg'
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
                label: {
                    text: 'Description of sofware system',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2'
                },
                headerText: {
                    text: 'System name.',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 15,
                    strokeWidth: 0,
                    refY: "50%"
                }
            }
        },
        //System name
        {
            type: 'standard.Image',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'System name',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: '../../assets/system-name.svg'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#333333',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                header: {
                    stroke: '#333333',
                    fill: '#00000000',
                    strokeWidth: 2,
                    strokeDasharray: '0',
                    height: 20
                },
                label: {
                    text: '[Software System]',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#333333',
                    refY: '90%',
                    refX: "30%"
                },
                headerText: {
                    text: 'System name.',
                    fill: '#333333',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 14,
                    strokeWidth: 0,
                    refY: "85%",
                    refX: "30%"
                }
            }
        },

    ];



})();
