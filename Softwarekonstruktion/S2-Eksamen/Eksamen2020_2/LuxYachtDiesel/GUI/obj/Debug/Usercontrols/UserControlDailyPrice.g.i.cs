﻿#pragma checksum "..\..\..\Usercontrols\UserControlDailyPrice.xaml" "{8829d00f-11b8-4213-878b-770e8597ac16}" "2856173208806D9D471DB7CCF029D8C39B5387E4D78E4C337FF100A9E900C784"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using GUI;
using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;


namespace GUI {
    
    
    /// <summary>
    /// UserControlDailyPrice
    /// </summary>
    public partial class UserControlDailyPrice : System.Windows.Controls.UserControl, System.Windows.Markup.IComponentConnector {
        
        
        #line 9 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Grid MainGrid;
        
        #line default
        #line hidden
        
        
        #line 72 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonOpret;
        
        #line default
        #line hidden
        
        
        #line 79 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonFortryd;
        
        #line default
        #line hidden
        
        
        #line 85 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonGem;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/GUI;component/usercontrols/usercontroldailyprice.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            this.MainGrid = ((System.Windows.Controls.Grid)(target));
            return;
            case 2:
            this.ButtonOpret = ((System.Windows.Controls.Button)(target));
            
            #line 77 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
            this.ButtonOpret.Click += new System.Windows.RoutedEventHandler(this.ButtonOpret_Click);
            
            #line default
            #line hidden
            return;
            case 3:
            this.ButtonFortryd = ((System.Windows.Controls.Button)(target));
            
            #line 84 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
            this.ButtonFortryd.Click += new System.Windows.RoutedEventHandler(this.ButtonFortryd_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.ButtonGem = ((System.Windows.Controls.Button)(target));
            
            #line 91 "..\..\..\Usercontrols\UserControlDailyPrice.xaml"
            this.ButtonGem.Click += new System.Windows.RoutedEventHandler(this.ButtonGem_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

