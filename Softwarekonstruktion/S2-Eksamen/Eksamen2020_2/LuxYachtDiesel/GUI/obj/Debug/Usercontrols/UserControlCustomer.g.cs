﻿#pragma checksum "..\..\..\Usercontrols\UserControlCustomer.xaml" "{8829d00f-11b8-4213-878b-770e8597ac16}" "7D4433B21B3AE6A5078D693FE1032BAA67181A1D871460C076A2C568844DA51D"
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
    /// UserControlCustomer
    /// </summary>
    public partial class UserControlCustomer : System.Windows.Controls.UserControl, System.Windows.Markup.IComponentConnector {
        
        
        #line 9 "..\..\..\Usercontrols\UserControlCustomer.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Grid MainGrid;
        
        #line default
        #line hidden
        
        
        #line 120 "..\..\..\Usercontrols\UserControlCustomer.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonOpret;
        
        #line default
        #line hidden
        
        
        #line 126 "..\..\..\Usercontrols\UserControlCustomer.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonRediger;
        
        #line default
        #line hidden
        
        
        #line 132 "..\..\..\Usercontrols\UserControlCustomer.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonGem;
        
        #line default
        #line hidden
        
        
        #line 138 "..\..\..\Usercontrols\UserControlCustomer.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button ButtonFortryd;
        
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
            System.Uri resourceLocater = new System.Uri("/GUI;component/usercontrols/usercontrolcustomer.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\Usercontrols\UserControlCustomer.xaml"
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
            
            #line 125 "..\..\..\Usercontrols\UserControlCustomer.xaml"
            this.ButtonOpret.Click += new System.Windows.RoutedEventHandler(this.ButtonOpret_Click);
            
            #line default
            #line hidden
            return;
            case 3:
            this.ButtonRediger = ((System.Windows.Controls.Button)(target));
            
            #line 131 "..\..\..\Usercontrols\UserControlCustomer.xaml"
            this.ButtonRediger.Click += new System.Windows.RoutedEventHandler(this.ButtonRediger_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.ButtonGem = ((System.Windows.Controls.Button)(target));
            
            #line 137 "..\..\..\Usercontrols\UserControlCustomer.xaml"
            this.ButtonGem.Click += new System.Windows.RoutedEventHandler(this.ButtonGem_Click);
            
            #line default
            #line hidden
            return;
            case 5:
            this.ButtonFortryd = ((System.Windows.Controls.Button)(target));
            
            #line 143 "..\..\..\Usercontrols\UserControlCustomer.xaml"
            this.ButtonFortryd.Click += new System.Windows.RoutedEventHandler(this.ButtonFortryd_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}
