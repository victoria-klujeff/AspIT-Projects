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
    /// Interaction logic for UserControlDiesel.xaml
    /// </summary>
    public partial class UserControlDiesel : UserControl
    {
        ClassBIZ BIZ;
        public UserControlDiesel(ClassBIZ inBIZ)
        {
            InitializeComponent();
            BIZ = inBIZ;
            MainGrid.DataContext = BIZ;
        }

        private void SaveTrade_Click(object sender, RoutedEventArgs e)
        {
            BIZ.InsertOrderInDB();
        }

        private void RegretTrade_Click(object sender, RoutedEventArgs e)
        {
            BIZ.RegretNewOrderForDB();
        }

        private void TextBox_TextChanged(object sender, TextChangedEventArgs e)
        {
            BIZ.CalculateAllValuesForOrder();
        }
    }
}
