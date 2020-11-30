using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using BIZ;

namespace GUI
{
    /// <summary>
    /// Interaction logic for UserControlCustomer.xaml
    /// </summary>
    public partial class UserControlCustomer : UserControl
    {
        ClassBIZ BIZ;
        public UserControlCustomer(ClassBIZ inBIZ)
        {
            InitializeComponent();
            BIZ = inBIZ;
            MainGrid.DataContext = BIZ;
        }

        private void ButtonOpret_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlUnlocked();
            BIZ.ComboBoxControlUnlocked();
        }

        private void ButtonRediger_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlUnlocked();
            BIZ.ComboBoxControlUnlocked();
        }

        private void ButtonGem_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlLocked();
            BIZ.ComboBoxControlLocked();
            if (BIZ.selectedCustomer.Id > 0)
            {
                BIZ.UpdateCustomerInDB();
            }
            else
            {
                BIZ.InsertCustomerInDB();
            }
        }

        private void ButtonFortryd_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlLocked();
            BIZ.ComboBoxControlLocked();
            BIZ.RegretUpdateOrNewCustomerForDB();
        }
    }
}
