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
    /// Interaction logic for UserControlDailyPrice.xaml
    /// </summary>
    public partial class UserControlDailyPrice : UserControl
    {
        ClassBIZ BIZ;
        public UserControlDailyPrice(ClassBIZ inBIZ)
        {
            InitializeComponent();
            BIZ = inBIZ;
            MainGrid.DataContext = BIZ;
        }

        private void ButtonOpret_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlUnlocked();
            
        }

        private void ButtonFortryd_Click(object sender, RoutedEventArgs e)
        {
            BIZ.textControlLocked();
            BIZ.RegretUpdateOrNewCustomerForDB();
        }

        private void ButtonGem_Click(object sender, RoutedEventArgs e)
        {
            BIZ.InsertDieselPriceInDB();
            BIZ.textControlLocked();

            BIZ.PriceControl();
        }
    }
}
